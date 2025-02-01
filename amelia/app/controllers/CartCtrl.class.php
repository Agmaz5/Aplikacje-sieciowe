<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class CartCtrl {
    

    
public function action_addToCart() {
    
    $productId = $_POST['productId'];

    
    
    $quantity = $_POST['quantity'];
    
    if ($quantity > 0)
    {

            
    $product = App::getDB()->get('products', '*', ['idProduct' => $productId]);

    if (!$product) {
        exit;
    }

  
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $app_url = App::getConf()->app_url;

       
        $existingOrder = App::getDB()->get('orders', '*', [
            'idUser' => $userId,
            'status' => 'Pending'
        ]);

        if (!$existingOrder) {
          
            $orderData = [
                'idUser' => $userId,
                'totalPrice' => 0, 
                'status' => 'Pending',
                'createdAt' => date('Y-m-d H:i:s'),
            ];
            $orderId = App::getDB()->insert('orders', $orderData);
        } else {
            $orderId = $existingOrder['idOrder'];
        }

        
        $existingOrderDetail = App::getDB()->get('orderdetails', '*', [
            'idOrder' => $orderId,
            'idProduct' => $productId
        ]);

        if ($existingOrderDetail) {
           
            $newQuantity = $existingOrderDetail['quantity'] + $quantity;
            App::getDB()->update('orderdetails', [
                'quantity' => $newQuantity
            ], [
                'idOrderDetail' => $existingOrderDetail['idOrderDetail']
            ]);
        } else {
           
            App::getDB()->insert('orderdetails', [
                'idOrder' => $orderId,
                'idProduct' => $productId,
                'quantity' => $quantity,
                'unitPrice' => $product['price'],
                'idUser' => $userId
            ]);
        }

        
        $orderDetails = App::getDB()->select('orderdetails', '*', ['idOrder' => $orderId]);
        $totalPrice = 0;
        foreach ($orderDetails as $item) {
            $totalPrice += $item['quantity'] * $item['unitPrice'];
        }

        
        App::getDB()->update('orders', [
            'totalPrice' => $totalPrice
        ], [
            'idOrder' => $orderId
        ]);

      
        $newStock = $product['stock'] - $quantity;
        if ($newStock >= 0){
            App::getDB()->update('products', [
                'stock' => $newStock
            ], [
                'idProduct' => $productId
            ]);            
        }

                $smarty = App::getSmarty();
        
                $smarty->assign("error", "") ;

        header('Location: ' . $app_url . '/displayAll');
    
    } else {
        $smarty = App::getSmarty();
        
                $smarty->assign("error", "You must be logged in to add product to cart.") ;

        $smarty->display("loginShow.tpl");
    }

    }else{
                        App::getRouter()->redirectTo("displayAll");

    }

}
    
    
    

public function action_showCart() {
    
    
    $userId = null;
    if (isset($_POST['userId'])){
            $userId = $_POST['userId'];
    
            
   
    $smarty = App::getSmarty();
    
                if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);
                }
    
    $db = App::getDB();
    
   
    $orderDetails = $db->select('orderdetails', '*', ['idUser' => $userId]);
    
   
    if ($orderDetails) {
       
        $productIds = array_map(function($order) {
            return $order['idProduct'];
        }, $orderDetails);
        
        
        $productIds = array_unique($productIds);
        
      
        $products = $db->select('products', ['idProduct', 'productName'], [
            'idProduct' => $productIds
        ]);
        
        
        $productNames = [];
        foreach ($products as $product) {
            $productNames[$product['idProduct']] = $product['productName'];
        }

       
        foreach ($orderDetails as &$order) {
            if (isset($productNames[$order['idProduct']])) {
                $order['productName'] = $productNames[$order['idProduct']];
            } else {
                $order['productName'] = 'Unknown'; 
            }
        }
        
       
        $smarty = App::getSmarty();
        
       
        $smarty->assign('orderDetails', $orderDetails);
        
        
        $smarty->display('cart.tpl');
        exit();
    } else {
      
        $smarty->display('cart.tpl');
        exit();
    }
}}

    
}
