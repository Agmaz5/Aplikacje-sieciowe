<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;


class CalcCtrl {

	private $form;
	private $result;


	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	

	public function getParams(){
		$this->form->kw = getFromRequest('kw');
		$this->form->ok = getFromRequest('ok');
		$this->form->op = getFromRequest('op');
	}
	

	public function validate() {
		if (! (isset ( $this->form->kw ) && isset ( $this->form->ok ) && isset ( $this->form->op ))) {
			return false;
		}
		
		if ($this->form->kw == "") {
			getMessages()->addError('Nie podano Kwoty');
		}
		if ($this->form->ok == "") {
			getMessages()->addError('Nie podano Okresu');
		}
                if ($this->form->op == "") {
			getMessages()->addError('Nie podano Oprocentowania');
		}
		
		if (! getMessages()->isError()) {
			
			if (! is_numeric ( $this->form->ok )) {
				getMessages()->addError('Kwota wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->ok )) {
				getMessages()->addError('Okres wartość nie jest liczbą całkowitą');
			}
                        
                        if (! is_numeric ( $this->form->ok )) {
				getMessages()->addError('Oprocentowanie wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->form->kw = intval($this->form->kw);
			$this->form->ok = intval($this->form->ok);
                        $this->form->op = intval($this->form->op);
			getMessages()->addInfo('Parametry poprawne.');
				

                        
                        if (!inRole('admin') && $this->form->op <= 5){
                            getMessages()->addError('Tylko administrator może wykonać tę operację');                            
                        }
                        else {
                            $this->result->result = ($this->form->kw / ($this->form->ok * 12) * (1+ $this->form->op/100));
			}
                        

			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
	

	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','Kalkulator kredytowy');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result); 
        getSmarty()->assign('page_header', 'Oblicz swoje raty kredytu.<br>
                Poznaj wysokość miesięcznych rat przed zaciągnięciem kredytu.');
                
		getSmarty()->display('CalcView.tpl');
	}
}
