<?php
require_once dirname(__FILE__).'/../config.php';


$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$oprocentowanie = $_REQUEST ['op'];

if ( ! (isset($x) && isset($y) && isset($oprocentowanie))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}
if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano okresu';
}

if (empty( $messages )) {
	
	if (! is_numeric( $x )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Okres czasu nie jest liczbą całkowitą';
	}	

}

if (empty ( $messages )) { 

	$x = intval($x);
	$y = intval($y);

	$result = $x / ($y*12);

	switch ($oprocentowanie) {
		case 'trzy' :
			$result = $result * 1.03;
			break;
		case 'cztery' :
			$result = $result * 1.04;
			break;
		case 'piec' :
			$result = $result * 1.05;
			break;
		default :
			$result = $result * 1.02;
			break;
	}
}

include 'calc_credit_view.php';