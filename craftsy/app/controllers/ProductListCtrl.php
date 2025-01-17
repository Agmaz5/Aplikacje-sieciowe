<?php

namespace app\controllers;



class ProductListCtrl {

    public function __construct() {

        $this->products = $this->getProducts();
    }

    public function getProducts() {
        $db = getDB();
        return $db->select('products', '*', [
            'isAvailable' => 1
        ]);
    }

    public function deleteProduct($idProduct) {
        $db = getDB();
        $db->update('products', ['isAvailable' => 0], ['idProduct' => $idProduct]); // Soft delete
    }

    public function execute() {
        $smarty = getSmarty();

        // Assign app_url to Smarty
        $app_url = getConf()->app_url;  // Get the app URL
        $smarty->assign('app_url', $app_url);  // Pass it to the template
        
        
        $smarty->assign('role', "creator");  // Pass it to the template
        $smarty->assign('userId', "1");  // Pass it to the template


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
