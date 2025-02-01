<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class CartCtrl {
    

    
public function action_addToCart() {
    // Sprawdź, czy produkt istnieje
    
    $productId = $_POST['productId'];

    $quantity = 1;
            
    $product = App::getDB()->get('products', '*', ['idProduct' => $productId]);

    if (!$product) {
        echo "Produkt nie istnieje!";
        exit;
    }

    // Jeśli użytkownik jest zalogowany, dodaj produkt do koszyka
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $app_url = App::getConf()->app_url;

        // Sprawdź, czy użytkownik ma aktywne zamówienie (status = 'Pending')
        $existingOrder = App::getDB()->get('orders', '*', [
            'idUser' => $userId,
            'status' => 'Pending'
        ]);

        if (!$existingOrder) {
            // Jeśli nie ma aktywnego zamówienia, stwórz nowe
            $orderData = [
                'idUser' => $userId,
                'totalPrice' => 0, // Cena całkowita będzie obliczona później
                'status' => 'Pending',
                'createdAt' => date('Y-m-d H:i:s'),
            ];
            $orderId = App::getDB()->insert('orders', $orderData);
        } else {
            $orderId = $existingOrder['idOrder'];
        }

        // Sprawdź, czy produkt już istnieje w zamówieniu
        $existingOrderDetail = App::getDB()->get('orderdetails', '*', [
            'idOrder' => $orderId,
            'idProduct' => $productId
        ]);

        if ($existingOrderDetail) {
            // Jeśli produkt już jest w zamówieniu, zaktualizuj ilość
            $newQuantity = $existingOrderDetail['quantity'] + $quantity;
            App::getDB()->update('orderdetails', [
                'quantity' => $newQuantity
            ], [
                'idOrderDetail' => $existingOrderDetail['idOrderDetail']
            ]);
        } else {
            // Jeśli produkt nie istnieje w zamówieniu, dodaj go
            App::getDB()->insert('orderdetails', [
                'idOrder' => $orderId,
                'idProduct' => $productId,
                'quantity' => $quantity,
                'unitPrice' => $product['price'],
                'idUser' => $userId
            ]);
        }

        // Oblicz cenę całkowitą zamówienia
        $orderDetails = App::getDB()->select('orderdetails', '*', ['idOrder' => $orderId]);
        $totalPrice = 0;
        foreach ($orderDetails as $item) {
            $totalPrice += $item['quantity'] * $item['unitPrice'];
        }

        // Zaktualizuj cenę całkowitą w zamówieniu
        App::getDB()->update('orders', [
            'totalPrice' => $totalPrice
        ], [
            'idOrder' => $orderId
        ]);

        // Zmniejsz ilość produktu w magazynie
        $newStock = $product['stock'] - 1;
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
}
    
    
    

public function action_showCart() {
    
    $userId = $_POST['userId'];
            
    // Pobierz połączenie z bazą danych
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
    
    // Zapytanie do bazy danych, aby pobrać dane z tabeli orderdetails dla danego użytkownika
    $orderDetails = $db->select('orderdetails', '*', ['idUser' => $userId]);
    
    // Jeśli są dane, wykonaj zapytanie o nazwy produktów
    if ($orderDetails) {
        // Pobierz wszystkie idProduct z tabeli orderdetails
        $productIds = array_map(function($order) {
            return $order['idProduct'];
        }, $orderDetails);
        
        // Usuń duplikaty (jeśli istnieją)
        $productIds = array_unique($productIds);
        
        // Zapytanie do bazy danych, aby pobrać nazwy produktów na podstawie idProduct
        $products = $db->select('products', ['idProduct', 'productName'], [
            'idProduct' => $productIds
        ]);
        
        // Przekształcamy wynik do tablicy asocjacyjnej dla łatwego dostępu
        $productNames = [];
        foreach ($products as $product) {
            $productNames[$product['idProduct']] = $product['productName'];
        }

        // Przechodzimy przez orderDetails i dodajemy nazwę produktu
        foreach ($orderDetails as &$order) {
            if (isset($productNames[$order['idProduct']])) {
                $order['productName'] = $productNames[$order['idProduct']];
            } else {
                $order['productName'] = 'Unknown'; // W przypadku, gdy brak nazwy produktu
            }
        }
        
        // Uzyskujemy dostęp do instancji Smarty
        $smarty = App::getSmarty();
        
        // Przypisujemy dane do zmiennej w szablonie
        $smarty->assign('orderDetails', $orderDetails);
        
        // Wyświetlamy szablon
        $smarty->display('cart.tpl');
        exit();
    } else {
        // Brak danych - jeśli chcesz, możesz tu wyświetlić odpowiednią wiadomość
        echo "No items in the cart.";
    }
}

    
}
