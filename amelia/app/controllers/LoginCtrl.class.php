<?php

namespace app\controllers;

use core\app;
use core\Message;
use core\Utils;
use core\RoleUtils;

class LoginCtrl {
    private $db;
    private $login;
    private $password;

    public function __construct() {
        
        $this->db = App::getDB();
    }
    
    
        public function action_loginDisplay() {
        

        $smarty = App::getSmarty();
            
            
            $smarty->assign("error", "");
        
            $smarty->display('loginShow.tpl');
          
            
           
    }
    
 

    public function action_login() {
      

        RoleUtils::removeRole("admin");
        RoleUtils::removeRole("creator");
        RoleUtils::removeRole("client");
        
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;


        
        
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


$roleName = $this->db->get("roles", ["roleName"], [
    "idRole" => $idroleDB
]);

if (password_verify($password, $passwordDB)) {


    session_destroy();
    session_start();

    $_SESSION['user_id'] = $idDB;
    $_SESSION['username'] = $username;
    $_SESSION['idRole'] = $idroleDB;  

    RoleUtils::addRole($roleName["roleName"]);
    
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
       
          
        
        RoleUtils::removeRole("admin");
        RoleUtils::removeRole("creator");
        RoleUtils::removeRole("client");
        
        
        session_destroy();
        
       
        
                $smarty = App::getSmarty();
                $smarty->assign("us", null);
                $smarty->assign("id", null);
                $smarty->assign("idRole", null);

        
       
        header("Location: " . App::getConf()->app_url);
    }

    private function redirectWithError($message) {
       
        header("Location: " . App::getConf()->app_url) . "displayAll";
       
 
    }
}


