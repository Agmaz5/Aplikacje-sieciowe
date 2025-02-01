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
class HelloCtrl {
    
    public function action_hello() {
		        
        $variable = 123;
        
        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        
        App::getSmarty()->assign("value",$variable);        
        App::getSmarty()->display("main.tpl");
        
    }
    
        public function action_loginDisplay() {
         //Pobierz dane z formularza

        $smarty = App::getSmarty();
            
            // Render the template
        
            $smarty->display('loginShow.tpl');
           // exit();
            
            //echo "test";
    }
    
    
    

public function action_showCart() {
    
    $userId = $_POST['userId'];
            
    // Pobierz połączenie z bazą danych
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
