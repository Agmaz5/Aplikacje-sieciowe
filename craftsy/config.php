<?php 
// Inicjalizacja zmiennej $conf jako obiektu
$conf = new stdClass();  // Tworzymy obiekt, aby móc przypisać właściwości

// Debugging - ustawienie trybu debugowania
$conf->debug = true; // ustaw na true podczas tworzenia systemu i używaj w aplikacji np. do generowania dodatkowych komunikatów

// konfiguracja podstawowa
$conf->server_name = 'localhost';   
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/craftsy';  // Zmienione na nową nazwę aplikacji
$conf->action_root = $conf->app_root.'/ctrl.php?action=';

// konfiguracja bazy danych (wymagane)
$conf->db_type = 'mysql';
$conf->db_server = 'localhost';
$conf->db_name = 'craftsy'; 
$conf->db_user = 'root';
$conf->db_pass = '';
$conf->db_charset = 'utf8';

// konfiguracja bazy danych (opcjonalna)
$conf->db_port = '3306';
$conf->db_prefix = '';
$conf->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

//wartości wygenerowane
$conf->action_url = $conf->server_url.$conf->action_root;
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path = dirname(__FILE__);
