<?php

namespace app\controllers;

class LoginCtrl {
    private $db;
    private $login;
    private $password;

    public function __construct() {
        // Pobierz połączenie do bazy danych
        $this->db = getDB();
    }
    
    
    public function action_loginDisplay() {
        // Pobierz dane z formularza

        $smarty = getSmarty();
            
            // Render the template
        
            $smarty->display('loginShow.tpl');
            exit();
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
    session_start();
    $_SESSION['user_id'] = $idDB;
    $_SESSION['username'] = $username;
        $_SESSION['idRole'] = $idroleDB;

    header("Location: " . getConf()->app_url . "/index.php");
} else {
    $this->redirectWithError("Invalid username or password.");
}

    }

    public function action_logout() {
        // Zakończ sesję użytkownika
        
        
        
        session_start();
        session_destroy();

        
        // Przekierowanie na stronę logowania
        header("Location: " . getConf()->app_url . "/index.php");
    }

    private function redirectWithError($message) {
        // Zapisz wiadomość błędu do sesji
        
        //session_start();
        $_SESSION['error'] = $message;

        // Przekierowanie na stronę logowania
                $smarty = getSmarty();

                    exit();
    }
}


if (isset($_POST['login'])) {
    
    
    // Ensure $conf is available here too
    $loginCtrl = new LoginCtrl();
    $loginCtrl->action_loginDisplay();  // Call action_productSave from the controller
    
    exit();
}



if (isset($_POST['logout'])) {
    
    
    // Ensure $conf is available here too
    $loginCtrl = new LoginCtrl();
    $loginCtrl->action_logout();  // Call action_productSave from the controller
    
    exit();
}