<?php 
// Załaduj konfigurację przed jej użyciem
require_once 'config.php'; // Upewnij się, że ścieżka jest poprawna

// Sprawdzenie, czy Medoo jest załadowane
require_once __DIR__ . '/vendor/autoload.php';  // Ładuje autoloader Composer

// Inicjalizacja klasy autoloadera
//$loader = new \core\ClassLoader();

require_once 'core/Router.class.php';  // Załaduj plik, w którym znajduje się klasa Router
require_once 'core/functions.php';  // Załaduj plik, w którym znajduje się klasa Router

$router = new \core\Router();

// Załaduj plik Route.class.php bezpośrednio
//require_once 'core/Route.php';


// Funkcja pomocnicza globalna do uzyskania instancji routera
function getRouter() {
    global $router;  // Odwołanie do wcześniej zainicjalizowanego obiektu routera
    return $router;
}


use Medoo\Medoo;

// Inicjalizacja połączenia z bazą danych
$database = new Medoo([
    'database_type' => $conf->db_type,
    'database_name' => $conf->db_name,
    'server' => $conf->db_server,
    'username' => $conf->db_user,
    'password' => $conf->db_pass,
    'charset' => $conf->db_charset,
]);




// Ustawienie konfiguracji sesji
session_start();

// Funkcja pomocnicza do uzyskiwania dostępu do instancji bazy danych
function getDB() {
    global $database;
    return $database;
}

// Sprawdzenie, czy użytkownik jest zalogowany
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Sprawdzenie, czy użytkownik ma odpowiednią rolę
function hasRole($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

// Logowanie użytkownika
function login($user_id, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $role;
}

// Wylogowanie użytkownika
function logout() {
    session_unset();
    session_destroy();
}

// Funkcja autoloading
function autoload($class) {
    $file = 'controllers/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

function &getConf(){
	global $conf; return $conf;
}

$smarty = null;	//przygotuj Smarty, twórz tylko raz - wtedy kiedy potrzeba
function &getSmarty(){
	global $smarty;
	if (!isset($smarty)){
		//stwórz Smarty
		include_once 'lib/smarty/Smarty.class.php';
		$smarty = new Smarty();	
		//przypisz konfigurację i messages
		$smarty->assign('conf',getConf());
		//zdefiniuj lokalizację widoków (aby nie podawać ścieżek przy odwoływaniu do nich)
		$smarty->setTemplateDir(array(
			'one' => getConf()->root_path.'/app/views',
			'two' => getConf()->root_path.'/app/views/templates'
		));
	}
	return $smarty;
}

require_once 'app/controllers/ProductEditCtrl.php';


spl_autoload_register('autoload');

// Ścieżki do zasobów statycznych (CSS, JS, obrazy)
define('BASE_URL', $conf->app_url); // Zakładając, że app_url jest również zdefiniowane w config.php
define('ASSETS_URL', BASE_URL . '/assets');
