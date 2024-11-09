<?php

// KONTROLER strony kalkulatora
require_once dirname(__FILE__) . '/../config.php';
//załaduj Smarty
require_once _ROOT_PATH . '/lib/smarty/libs/Smarty.class.php';

//pobranie parametrów
function getParams(&$form) {
    $form['kw'] = isset($_REQUEST['kw']) ? $_REQUEST['kw'] : null;
    $form['ok'] = isset($_REQUEST['ok']) ? $_REQUEST['ok'] : null;
    $form['op'] = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form, &$infos, &$msgs, &$hide_intro) {

    //sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
    if (!(isset($form['kw']) && isset($form['ok']) && isset($form['op']) ))
        return false;

    //parametry przekazane zatem
    //nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
    // - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
    $hide_intro = true;

    $infos [] = 'Przekazano parametry.';

    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($form['kw'] == "")
        $msgs [] = 'Nie podano Kwoty';
    if ($form['ok'] == "")
        $msgs [] = 'Nie podano Okresu';
    if ($form['op'] == "")
        $msgs [] = 'Nie podano Opocentowania';

    //nie ma sensu walidować dalej gdy brak parametrów
    if (count($msgs) == 0) {
        // sprawdzenie, czy $kw i $y są liczbami całkowitymi
        if (!is_numeric($form['kw']))
            $msgs [] = 'Pierwsza wartość nie jest liczbą';
        if (!is_numeric($form['ok']))
            $msgs [] = 'Druga wartość nie jest liczbą';
    }

    if (count($msgs) > 0)
        return false;
    else
        return true;
}

// wykonaj obliczenia
function process(&$form, &$infos, &$msgs, &$result) {
    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';

    //konwersja parametrów na int
    $form['kw'] = floatval($form['kw']);
    $form['ok'] = floatval($form['ok']);
    $form['op'] = floatval($form['op']);

    $result = $form['kw'] / ($form['ok'] * 12) * (1 + ($form['op'] / 100));
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;

getParams($form);
if (validate($form, $infos, $messages, $hide_intro)) {
    process($form, $infos, $messages, $result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator Kredytowy');
$smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header', 'Oblicz swoje raty kredytu.<br>
                Poznaj wysokość miesięcznych rat przed zaciągnięciem kredytu.');

$smarty->assign('hide_intro', $hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form', $form);
$smarty->assign('result', $result);
$smarty->assign('messages', $messages);
$smarty->assign('infos', $infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH . '/app/calc.html');
