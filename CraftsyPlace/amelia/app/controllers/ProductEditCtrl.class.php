<?php


namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class ProductEditCtrl {

    // Modify the method to accept the $productId as a parameter
    public function action_productEdit() {
        $productId = $_POST['productId'];
        
        $app_url = App::getConf()->app_url;  // Get the app URL
        
        // Retrieve product data from the database
        $product = App::getDB()->get('products', '*', ['idProduct' => $productId]);

        if ($product) {
            // Pass the product data to Smarty
            $smarty = App::getSmarty();
            $smarty->assign('product', $product);
            
            // Render the template
            $smarty->display('productEdit.tpl');
            
            //exit();
        } else {
            // Redirect if the product is not found
            header('Location: ' . $app_url . '/productList');
            //exit;
        }
    }

    // Method to handle form submission and save the data
    public function action_productSave() {


        // Ensure the 'POST' data is available
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the POST data from the form
            $idProduct = isset($_POST['id']) ? $_POST['id'] : "null";

            echo $idProduct;
            
            $productName = isset($_POST['name']) ? $_POST['name'] : null;
            $price = isset($_POST['price']) ? $_POST['price'] : null;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
            $description = isset($_POST['description']) ? $_POST['description'] : null;

            // Validate the data (you can add more validation here)
            if ($idProduct && $productName && $price && $stock && $description) {
                // Update the product in the database
                $updateData = [
                    'productName' => $productName,
                    'price' => $price,
                    'stock' => $stock,
                    'description' => $description
                ];

                // Assuming getDB() is a function that interacts with your database
                $result = App::getDB()->update('products', $updateData, ['idProduct' => $idProduct]);

                // Check if the update was successful
                if ($result) {
                    // Redirect to the product list or show a success message
                    header("Location: " . App::getConf()->app_url) . "myProductList";
                    exit;
                } else {
                    // If the update fails, show an error
                    echo 'Failed to save product details';
                }
            } else {
                // If data is invalid, show an error
                echo 'Please fill in all fields';
            }
        } else {
            // If not a POST request, redirect to the product list
            header("Location: " . App::getConf()->app_url) . "myProductList";
            exit;
        }
    }
}

