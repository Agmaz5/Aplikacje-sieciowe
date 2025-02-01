<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class SoldCtrl {
    
    public function action_realiseOrder() {
        if (!isset($_POST['orderDetailId'])) {
            echo "Invalid request.";
            exit();
        }

        $orderId = $_POST['orderDetailId'];

        // Połączenie z bazą danych
        $db = App::getDB();

        // Sprawdzenie, czy zamówienie istnieje
        $order = $db->get('orders', '*', ['idOrder' => $orderId]);

        if (!$order) {
            echo "Order not found.";
            exit();
        }

        // Usuń szczegóły zamówienia z tabeli orderdetails
        $db->delete('orderdetails', ['idOrder' => $orderId]);

        // Usuń samo zamówienie z tabeli orders
        $db->delete('orders', ['idOrder' => $orderId]);

        // Przekierowanie z powrotem na stronę zamówień
        $app_url = App::getConf()->app_url;
        header("Location: $app_url/sold");
        exit();
    }
    
    
    
    public function action_showSold() {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!isset($_SESSION['user_id'])) {
            echo "Musisz być zalogowany, aby zobaczyć sprzedane produkty.";
            exit();
        }
        
        

        $userId = $_SESSION['user_id']; // Identyfikator zalogowanego użytkownika

        // Pobierz produkty sprzedane przez użytkownika
        $db = App::getDB();
        $soldProducts = $db->select('orderdetails', [
            '[>]products' => ['idProduct' => 'idProduct'], // Dołącz produkty do zamówień
            '[>]orders' => ['idOrder' => 'idOrder']       // Dołącz zamówienia
        ], [
            'products.productName',
            'orderdetails.quantity',
            'orderdetails.unitPrice',
            'orders.createdAt',
            'orders.idOrder'
        ], [
            'products.idCreator' => $userId // Warunek: produkty należą do zalogowanego użytkownika
        ]);
        
        

        // Przekaż dane do szablonu
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
