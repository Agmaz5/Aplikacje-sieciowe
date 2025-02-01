<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class AdminCtrl {
   
    public function action_controlPanel() {
        $smarty = App::getSmarty();
        $db = App::getDB();

        // Sprawdzenie, czy użytkownik jest zalogowany
        if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];

            $smarty->assign("us", $userDB);
            $smarty->assign("id", $idDB);
            $smarty->assign("idRole", $roleidDB);
        }

        try {
            $users = $db->select("users", [
                "idUser",
                "username",
                "email",
                "idRole",
                "createdAt"
            ]);

            if ($users) {
                $smarty->assign("users", $users);
            } else {
                $smarty->assign("users", []);
            }
        } catch (\Exception $e) {
            $smarty->assign("users", []);
        }

        $smarty->display("controlPanel.tpl");
    }
    
    
    public function action_userEdit(){
        
 
                    $iduser = $_POST['idUserE'];
        
        
            $smarty = App::getSmarty();
        
        
            if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];
            
            
            
            $user = App::getDB()->get("users", ["idUser", "username" ,"password", "idRole"], [
    "idUser" => $iduser
]);
                    

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);
                $smarty->assign("userE", $user);

                    }
        $smarty->display("editShow.tpl");

    }
    
    
    public function action_userSave(){
        

            
            $userid =  $_POST['userid'];
            $userName = $_POST['userName'];
            $password = $_POST['pass'];
            $idRole = $_POST['role'];


            $password = password_hash($password, PASSWORD_DEFAULT);
            
            
            if ($userid && $userName && $password && $idRole) {
                $updateData = [
                    'idUser' => $userid,
                    'username' => $userName,
                    'password' => $password,
                    'idRole' => $idRole
                ];


                $result = App::getDB()->update('users', $updateData, ['idUser' => $userid]);


                if ($result) {
                  
                            App::getRouter()->forwardTo('controlPanel');
                  
                    exit;
                } 
            } 
            
    }
    
public function action_userDelete() {


    $idUser = $_POST["idUserD"]; 


    $db = App::getDB();

    try {
        
        $db->pdo->beginTransaction();
       
        $db->delete("users", [
            "idUser" => $idUser
        ]);

    
        $db->pdo->commit();

    } catch (Exception $e) {
     
        $db->pdo->rollBack();
    }

   
    App::getRouter()->forwardTo('controlPanel');

    exit();
}


    public function action_addUser () {
            $smarty = App::getSmarty();
        
        
            if (isset($_SESSION['user_id'])) {
                
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];
           
                    

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);

                    }
        $smarty->display("adduser.tpl");

    }
    
public function action_addNewUser() {
 
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $isVerified = $_POST['isVerified'];
        $idRole = $_POST['idRole'];
        $deliveryAddress = $_POST['deliveryAddress'];

      
        if (empty($username) || empty($email) || empty($password)) {
            echo "Error: All fields are required.";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid email format.";
            return;
        }


      
        $db = App::getDB();

        try {
       
            $db->insert("users", [
                "username" => $username,
                "email" => $email,
                "password" => $password,
                "isVerified" => $isVerified,
                "idRole" => $idRole,
                "deliveryAddress" => $deliveryAddress
            ]);

            if ($db->id()) {
                App::getRouter()->forwardTo('controlPanel');

                exit();
            } else {
                    App::getRouter()->forwardTo('controlPanel');

            }
        } catch (Exception $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
}