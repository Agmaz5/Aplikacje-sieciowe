<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class ProductListCtrl {
    


public function __construct() {
    $this->products = $this->getProducts();
}




    public function getProducts() {
        $db = App::getDB();
        return $db->select('products', '*', [
            'isAvailable' => 1
        ]);
    }

    public function action_productDelete() {

        $idProduct = $_POST["productId"]; 
        $db = App::getDB();
        $db->update('products', ['isAvailable' => 0], ['idProduct' => $idProduct]);
            App::getRouter()->forwardTo('myProductList');

    }
    
    public function action_displayAll(){
        
        
        $maxproductPrice = 1000000000;
        
                
        if (isset($_POST['price'])){
            $maxproductPrice = $_POST['price'];
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
                $smarty->assign('priceP', $maxproductPrice);
                
                
                $smarty->display('allProducts.tpl');
    }
  


    public function action_myProductList() {
        $smarty = App::getSmarty();

      
        $app_url = App::getConf()->app_url; 
        $smarty->assign('app_url', $app_url); 
        
        
        


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
    
public function action_addProduct() {
  
    $db = App::getDB();

    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    

    
   


    
    $idCreator = $_SESSION['user_id'] ?? 1;  
    $category = 'Uncategorized';  
    $isAvailable = 1;  


    try {
       
        $db->insert('products', [
            'idCreator'   => $idCreator,
            'productName' => $name,
            'description' => $description,
            'price'       => $price,
            'stock'       => $stock,
            'category'    => $category,
            'isAvailable' => $isAvailable,

        ]);

        if ($db->id()) {
           
            App::getRouter()->redirectTo('displayAll');
        } else {
            throw new \Exception("Failed to add product.");
        }

    } catch (\Exception $e) {
        App::getMessages()->addMessage(new \core\Message("Error: " . $e->getMessage(), \core\Message::ERROR));
        App::getRouter()->forwardTo('newShow');
    }
}

   
    
    
    public function action_newShow() {
        $smarty = App::getSmarty();
        
        
                    if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];
                    

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);
                    }
        $smarty->display("newProduct.tpl");
    }
    
}
