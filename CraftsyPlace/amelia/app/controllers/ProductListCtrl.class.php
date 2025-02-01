<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class ProductListCtrl {
    


public function __construct() {
    $this->userName = "guest123456789"; // Zmienna została przypisana do właściwości klasy
    $this->products = $this->getProducts();
}




    public function getProducts() {
        $db = App::getDB();
        return $db->select('products', '*', [
            'isAvailable' => 1
        ]);
    }

    public function deleteProduct($idProduct) {
        $db = App::getDB();
        $db->update('products', ['isAvailable' => 0], ['idProduct' => $idProduct]); // Soft delete
    }
    
    public function action_displayAll(){
        
        $productPrice = 1000000000;
        
                
        if (isset($_POST['price'])){
            $productPrice = $_POST['price'];
        }

        $smarty = App::getSmarty();
        

            if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);

        }
                $smarty->assign('products', $this->products);
                $smarty->assign('priceP', $productPrice);
                $smarty->display('allProducts.tpl');
    }
  


    public function action_myProductList() {
        $smarty = App::getSmarty();

        // Assign app_url to Smarty
        $app_url = App::getConf()->app_url;  // Get the app URL
        $smarty->assign('app_url', $app_url);  // Pass it to the template
        
        
        


               if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];
                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);

    
        } else {
    echo "Użytkownik nie jest zalogowany.";
}


        // Handle delete request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['idProduct'])) {
            $idProduct = $_GET['idProduct'];
            $this->deleteProduct($idProduct);
            header('Location: ' . $app_url . '/productList');
            exit();
        }

        $smarty->assign('products', $this->products);
        $smarty->display('productList.tpl');
        
    }
}
