<?php
namespace App\Controllers;

class ProductAddEditCtrl {
    private $product;
    
    public function __construct($productId = null) {
        if ($productId) {
            $this->product = $this->getProductById($productId);
        } else {
            $this->product = [];
        }
    }

    public function getProductById($productId) {
        $db = getDB();
        return $db->get('products', '*', [
            'idProduct' => $productId
        ]);
    }

    public function saveProduct($data) {
        $db = getDB();
        if (isset($data['idProduct'])) {
            // Update product
            $db->update('products', [
                'productName' => $data['productName'],
                'description' => $data['description'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'category' => $data['category'],
                'isAvailable' => $data['isAvailable'],
                'modifiedAt' => date('Y-m-d H:i:s')
            ], [
                'idProduct' => $data['idProduct']
            ]);
        } else {
            // Insert new product
            $db->insert('products', [
                'idCreator' => $_SESSION['user_id'],
                'productName' => $data['productName'],
                'description' => $data['description'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'category' => $data['category'],
                'isAvailable' => $data['isAvailable'],
                'createdAt' => date('Y-m-d H:i:s'),
                'modifiedAt' => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->saveProduct($_POST);
            header("Location: " . getConf()->app_url . "/productList");
            exit;
        }

        $smarty = getSmarty();
        $smarty->assign('product', $this->product);
        $smarty->display('productAddEditForm.tpl');
    }
}
