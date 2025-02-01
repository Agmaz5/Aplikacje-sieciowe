<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class SoldCtrl {
    
    public function action_realiseOrder() {
        if (!isset($_POST['orderDetailId'])) {
            exit();
        }

        $orderId = $_POST['orderDetailId'];

        
        $db = App::getDB();

        
        $order = $db->get('orders', '*', ['idOrder' => $orderId]);

        if (!$order) {
            exit();
        }

        
        $db->delete('orderdetails', ['idOrder' => $orderId]);

        
        $db->delete('orders', ['idOrder' => $orderId]);

        
        $app_url = App::getConf()->app_url;
        header("Location: $app_url/showSold");
        exit();
    }
    
    
    
    public function action_showSold() {
       
        if (!isset($_SESSION['user_id'])) {
            exit();
        }
        
        

        $userId = $_SESSION['user_id'];

        
        $db = App::getDB();
        $soldProducts = $db->select('orderdetails', [
            '[>]products' => ['idProduct' => 'idProduct'], 
            '[>]orders' => ['idOrder' => 'idOrder']       
        ], [
            'products.productName',
            'orderdetails.quantity',
            'orderdetails.unitPrice',
            'orders.createdAt',
            'orders.idOrder'
        ], [
            'products.idCreator' => $userId 
        ]);
        
        

       
        $smarty = App::getSmarty();
        
                if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);
                }        
        
        
        
        
        $smarty->assign('soldProducts', $soldProducts);
        $smarty->display('sold.tpl');
    }
}
