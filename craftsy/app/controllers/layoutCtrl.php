<?php
namespace app\controllers;


class LayoutCtrl {

    
    // Konstruktor kontrolera
    public function __construct() {
        // Inicjalizuj zmienne lub dane, które będą dostępne w szablonie
        $this->conf = $this->getConf();  // Pobierz konfigurację (np. role, dane konfiguracyjne)
        
    }

    // Metoda do pobierania konfiguracji
    public function getConf() {
        // Tutaj wczytujesz konfigurację (może pochodzić z bazy danych, pliku konfiguracyjnego, itp.)
        // Przykład:
        return (object) [
            'roles' => ['admin', 'user'],  // Przykładowe dane
            'app_url' => 'http://localhost/craftsy'  // URL aplikacji
        ];
    }

    // Metoda wykonawcza, która przypisuje zmienne do Smarty
    public function execute() {
        $smarty = getSmarty();
        
        
        
        // Przekazywanie danych do szablonu
        $smarty->assign('conf', $this->conf);
        
        // Wyświetlanie szablonu layout.tpl
        $smarty->display('layout.tpl');
        
        exit();
    }
}
