<?php
require_once dirname(__FILE__).'/init.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: ".$conf->root_path."/ctrl.php");

//przekazanie żądania do następnego dokumentu ("forward")
include $conf->root_path.'/ctrl.php';

// Includuj odpowiednie pliki
require_once 'app/controllers/LayoutCtrl.php';

require_once 'app/controllers/LoginCtrl.php';


// Utwórz nowy obiekt kontrolera
$layoutCtrl = new \app\controllers\LayoutCtrl();
$edit = new \app\controllers\ProductEditCtrl();


// Uruchom kontroler
$layoutCtrl->execute();

