<?php

namespace app\controllers;

class LoginCtrl {
    private $db;

    public function __construct() {
        // Pobierz połączenie do bazy danych
        $this->db = getDB();
    }

    public function action_login() {
        // Pobierz dane z formularza
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Sprawdź, czy wprowadzono dane
        if (!$username || !$password) {
            $this->redirectWithError("Login and password are required.");
            return;
        }

        // Wyszukaj użytkownika w bazie danych
        $user = $this->db->get("users", ["id", "username", "password_hash"], [
            "username" => $username
        ]);

        // Sprawdź, czy użytkownik istnieje i hasło jest poprawne
        if ($user && password_verify($password, $user['password_hash'])) {
            // Zaloguj użytkownika
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Przekierowanie na stronę główną lub dashboard
            header("Location: " . getConf()->app_url . "/dashboard");
        } else {
            // Błąd logowania
            $this->redirectWithError("Invalid username or password.");
        }
    }

    public function action_logout() {
        // Zakończ sesję użytkownika
        session_start();
        session_destroy();

        // Przekierowanie na stronę logowania
        header("Location: " . getConf()->app_url . "/loginShow");
    }

    private function redirectWithError($message) {
        // Zapisz wiadomość błędu do sesji
        session_start();
        $_SESSION['error'] = $message;

        // Przekierowanie na stronę logowania
        header("Location: " . getConf()->app_url . "/loginShow");
    }
}


if (isset($_POST['login'])) {
    
    echo "test";
    
    // Ensure $conf is available here too
    //$productEditCtrl = new LoginCtrl();
    //$productEditCtrl->action_login();  // Call action_productSave from the controller
    
    //exit();
}