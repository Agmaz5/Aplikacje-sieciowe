<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kw,&$ok,&$op){
	$kw = isset($_REQUEST['kw']) ? $_REQUEST['kw'] : null;
	$ok = isset($_REQUEST['ok']) ? $_REQUEST['ok'] : null;
	$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	
}

function validate(&$kw,&$ok,&$op,&$messages){
	if ( ! (isset($kw) && isset($ok) && isset($op))) {
		return false;
	}

	if ( $kw == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $ok == "") {
		$messages [] = 'Nie podano okresu';
	}
	if ( $op == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $kw )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $ok )) {
		$messages [] = 'Okres nie jest liczbą całkowitą';
	}	

	if ($kw < 0){
		$messages [] = 'Kwota nie może być ujemna';
	}

	if ($ok < 0){
		$messages [] = 'Okres nie może być ujemny';
	}

	if ($op < 0){
		$messages [] = 'Oprocentowanie nie może być ujemne';
	}
	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kw,&$ok,&$op,&$messages,&$result){
	global $role;
	
	$kw = intval($kw);
	$ok = intval($ok);
	$ok = floatval($ok);

	// oprocentowanie od 0 do 3 jest zarezerwowane dla administratora
	if($role == 'user'){
		if($op > 3){
			$result = $kw / ($ok*12) * (1+($op/100));
		}
		else{
			$messages [] = 'Tylko administrator może korzystać z tanich pożyczek. Wybierz oprocentowanie większe od 3';
		}
	}
	else{
		$result = $kw / ($ok*12) * (1+($op/100));
	}

}

$kw = null;
$ok = null;
$op = null;
$result = null;
$messages = array();

getParams($kw,$ok,$op);
if ( validate($kw,$ok,$op,$messages) ) { 
	process($kw,$ok,$op,$messages,$result);
}

include 'calc_credit_view.php';