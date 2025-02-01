<?php


namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class ProductEditCtrl {

 
    public function action_productEdit() {
        $productId = $_POST['productId'];
        
        $app_url = App::getConf()->app_url;  
        
       
        $product = App::getDB()->get('products', '*', ['idProduct' => $productId]);

        if ($product) {
            
            $smarty = App::getSmarty();
            $smarty->assign('product', $product);
            
            
            $smarty->display('productEdit.tpl');
            
           
        } else {
           
            header('Location: ' . $app_url . '/myProductList');
            
           
        }
    }

   
    public function action_productSave() {


        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $idProduct = isset($_POST['id']) ? $_POST['id'] : "null";

            echo $idProduct;
            
            $productName = isset($_POST['name']) ? $_POST['name'] : null;
            $price = isset($_POST['price']) ? $_POST['price'] : null;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
            $description = isset($_POST['description']) ? $_POST['description'] : null;

           
            if ($idProduct && $productName && $price && $stock && $description) {
                
                $updateData = [
                    'productName' => $productName,
                    'price' => $price,
                    'stock' => $stock,
                    'description' => $description
                ];

              
                $result = App::getDB()->update('products', $updateData, ['idProduct' => $idProduct]);

                
                if ($result) {
                    
                    header("Location: " . App::getConf()->app_url) . "myProductList";
                    exit;
                } else {
                    
                    echo 'Failed to save product details';
                }
            } else {
                
                echo 'Please fill in all fields';
            }
        } else {
          
            header("Location: " . App::getConf()->app_url) . "myProductList";
            exit;
        }
    }
    


   

    
    
    
}

