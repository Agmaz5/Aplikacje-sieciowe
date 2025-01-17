<?php


namespace app\controllers;

class ProductEditCtrl {

    // Modify the method to accept the $productId as a parameter
    public function action_productEdit($productId) {
        $app_url = getConf()->app_url;  // Get the app URL
        
        // Retrieve product data from the database
        $product = getDB()->get('products', '*', ['idProduct' => $productId]);

        if ($product) {
            // Pass the product data to Smarty
            $smarty = getSmarty();
            $smarty->assign('product', $product);
            
            // Render the template
            $smarty->display('productEdit.tpl');
        } else {
            // Redirect if the product is not found
            header('Location: ' . $app_url . '/productList');
            exit;
        }
    }

    // Method to handle form submission and save the data
    public function action_productSave() {
        
                                echo "test";

        // Ensure the 'POST' data is available
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the POST data from the form
            $idProduct = isset($_POST['id']) ? $_POST['id'] : "null";

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
                $result = getDB()->update('products', $updateData, ['idProduct' => $idProduct]);

                // Check if the update was successful
                if ($result) {
                    // Redirect to the product list or show a success message
                    header('Location: ' . getConf()->app_url . '/index.php');
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
            header('Location: ' . getConf()->app_url . '/productList');
            exit;
        }
    }
}


// In the file where you're handling the form submission or other action
if (isset($_POST['edition']) && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    
    // Ensure $conf is available here too
    global $conf;
    
    // Call the action method and pass the productId as an argument
    $productEditCtrl = new ProductEditCtrl();
    $productEditCtrl->action_productEdit($productId); // Passing $productId to the method


}


// In the file where you're handling the form submission or other action
// In the file where you're handling the form submission or other action
if (isset($_POST['save'])) {
    
    
    // Ensure $conf is available here too
    $productEditCtrl = new ProductEditCtrl();
    $productEditCtrl->action_productSave();  // Call action_productSave from the controller
    
    exit();
}
