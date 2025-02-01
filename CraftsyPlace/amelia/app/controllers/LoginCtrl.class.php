<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class LoginCtrl {
    private $db;
    private $login;
    private $password;

    public function __construct() {
        // Pobierz połączenie do bazy danych
        $this->db = App::getDB();
    }
    
    
        public function action_loginDisplay() {
         //Pobierz dane z formularza

        $smarty = App::getSmarty();
            
            // Render the template
            $smarty->assign("error", "");
        
            $smarty->display('loginShow.tpl');
           // exit();
            
            //echo "test";
    }
    
 

    public function action_login() {
        // Pobierz dane z formularza

        
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;


        
        // Sprawdź, czy wprowadzono dane
        if (!$username || !$password) {
            $this->redirectWithError("Login and password are required.");
            return;
        }

$idDB = null;
$passwordDB = null;
$idroleDB = null;
        
$user = $this->db->get("users", ["idUser", "password", "idRole"], [
    "username" => $username
]);

if ($user) {
    $idDB = $user['idUser'];
    $passwordDB = $user['password'];
    $idroleDB = $user['idRole'];

} 


if ($password == $passwordDB) {
    
    session_destroy();
    session_start();
    $_SESSION['user_id'] = $idDB;
    $_SESSION['username'] = "$username";
    $_SESSION['idRole'] = $idroleDB;
    
            $smarty = App::getSmarty();

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);

                
        
        

    header("Location: " . App::getConf()->app_url) . "displayAll";
    

} else {
    $this->redirectWithError("Invalid username or password.");
}

    }

    public function action_logout() {
        // Zakończ sesję użytkownika
          
        
        
        session_destroy();
        
        session_start();
        
                $smarty = App::getSmarty();
                $smarty->assign("us", null);
                $smarty->assign("id", null);
                $smarty->assign("idRole", null);

        
        // Przekierowanie na stronę logowania
        header("Location: " . App::getConf()->app_url);
    }

    private function redirectWithError($message) {
        // Zapisz wiadomość błędu do sesji
        header("Location: " . App::getConf()->app_url) . "displayAll";
        //session_start();
 
    }
}


