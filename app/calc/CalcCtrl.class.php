<?php

// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path . '/lib/smarty/Smarty.class.php';
require_once $conf->root_path . '/lib/Messages.class.php';
require_once $conf->root_path . '/app/calc/CalcForm.class.php';
require_once $conf->root_path . '/app/calc/CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */
class CalcCtrl {

    private $msgs;   //wiadomości dla widoku
    private $infos;  //informacje dla widoku
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    private $hide_intro; //zmienna informująca o tym czy schować intro

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->hide_intro = false;
    }

    /**
     * Pobranie parametrów
     */
    public function getParams() {
        $this->form->kw = isset($_REQUEST ['kw']) ? $_REQUEST ['kw'] : null;
        $this->form->ok = isset($_REQUEST ['ok']) ? $_REQUEST ['ok'] : null;
        $this->form->op = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
    }

    /**
     * Walidacja parametrów
     * @return true jeśli brak błedów, false w przeciwnym wypadku 
     */
    public function validate() {
        // sprawdzenie, czy parametry zostały przekazane
        if (!(isset($this->form->kw) && isset($this->form->ok) && isset($this->form->op))) {
            // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            return false;
        } else {
            $this->hide_intro = true; //przyszły pola formularza - schowaj wstęp
        }

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->kw == "") {
            $this->msgs->addError('Nie podano kwoty');
        }
        if ($this->form->ok == "") {
            $this->msgs->addError('Nie podano okresu');
        }
        if ($this->form->op == "") {
            $this->msgs->addError('Nie podano oprocentowania');
        }

        // nie ma sensu walidować dalej gdy brak parametrów
        if (!$this->msgs->isError()) {

            // sprawdzenie, czy $x i $y są liczbami całkowitymi
            if (!is_numeric($this->form->kw)) {
                $this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
            }

            if (!is_numeric($this->form->ok)) {
                $this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
            }
        }

        return !$this->msgs->isError();
    }

    /**
     * Pobranie wartości, walidacja, obliczenie i wyświetlenie
     */
    public function process() {

        $this->getparams();

        if ($this->validate()) {

            //konwersja parametrów na int
            $this->form->kw = intval($this->form->kw);
            $this->form->ok = intval($this->form->ok);
            $this->form->op = doubleval($this->form->op);

            $this->msgs->addInfo('Parametry poprawne.');

            //wykonanie operacji
            $this->result->result = $this->form->kw / ($this->form->ok * 12) * (1 + ($this->form->op / 100));

            $this->msgs->addInfo('Wykonano obliczenia.');
        }

        $this->generateView();
    }

    /**
     * Wygenerowanie widoku
     */
    public function generateView() {
        global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf', $conf);

        $smarty->assign('page_title', 'Kalkulator Kredytowy');
        $smarty->assign('page_description', 'Kalkulator kredytowy z jednym punktem wejścia');
        $smarty->assign('page_header', 'Oblicz swoje raty kredytu.<br>
                Poznaj wysokość miesięcznych rat przed zaciągnięciem kredytu.');

        $smarty->assign('hide_intro', $this->hide_intro);

        $smarty->assign('msgs', $this->msgs);
        $smarty->assign('form', $this->form);
        $smarty->assign('res', $this->result);

        $smarty->display($conf->root_path . '/app/calc/CalcView.html');
    }

}
