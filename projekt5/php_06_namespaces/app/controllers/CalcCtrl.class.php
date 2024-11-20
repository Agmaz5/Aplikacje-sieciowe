<?php
namespace app\controllers;


use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora
 * @author Agnieszka Mazur
 *
 */
class CalcCtrl {

    private $form;
    private $result;

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    /**
     * Pobranie parametrów
     */
    public function getParams() {
        $this->form->kw = getFromRequest('kw');
        $this->form->ok = getFromRequest('ok');
        $this->form->op = getFromRequest('op');
    }

    /**
     * Walidacja parametrów
     * @return true jeśli brak błedów, false w przeciwnym wypadku 
     */
    public function validate() {
        if (!(isset($this->form->kw) && isset($this->form->ok) && isset($this->form->op))) {
            return false;
        }

        if ($this->form->kw == "") {
            getMessages()->addError('Nie podano kwoty');
        }
        if ($this->form->ok == "") {
            getMessages()->addError('Nie podano okresu');
        }
        if ($this->form->op == "") {
            getMessages()->addError('Nie podano oprocentowania');
        }

        if (!getMessages()->isError()) {

            if (!is_numeric($this->form->kw)) {
                getMessages()->addError('Kwota nie jest liczbą całkowitą');
            }

            if (!is_numeric($this->form->ok)) {
                getMessages()->addError('Okres wartość nie jest liczbą całkowitą');
            }
        }

        return !getMessages()->isError();
    }

    /**
     * Pobranie wartości, walidacja, obliczenie i wyświetlenie
     */
    public function process() {

        $this->getParams();

        if ($this->validate()) {

            $this->form->kw = intval($this->form->kw);
            $this->form->ok = intval($this->form->ok);
            $this->form->op = doubleval($this->form->op);
            getMessages()->addInfo('Parametry poprawne.');

            $this->result->result = $this->form->kw / ($this->form->ok * 12) * (1 + ($this->form->op / 100));

            getMessages()->addInfo('Wykonano obliczenia.');
        }

        $this->generateView();
    }

    /**
     * Wygenerowanie widoku
     */
    public function generateView() {

        getSmarty()->assign('page_title', 'Kalkulator Kredytowy');
        getSmarty()->assign('page_description', 'Kalkulator kredytowy z jednym punktem wejścia');
        getSmarty()->assign('page_header', 'Oblicz swoje raty kredytu.<br>
                Poznaj wysokość miesięcznych rat przed zaciągnięciem kredytu.');

        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('res', $this->result);

        getSmarty()->display('CalcView.tpl');
    }
}
