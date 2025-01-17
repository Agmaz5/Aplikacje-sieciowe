<?php

namespace app\controllers;

        global $userName;


class ProductListCtrl {
    


public function __construct() {
    $this->userName = "guest123456789"; // Zmienna została przypisana do właściwości klasy
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
    
    public function action_displayAll(){
        $smarty = getSmarty();
        

            if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                



    
        }
        
                        $smarty->assign('products', $this->products);

                $smarty->display('allProducts.tpl');

    }
    
public function actionAddToCart($productId, $quantity) {
    // Sprawdź, czy produkt istnieje
    $product = getDB()->get('products', '*', ['idProduct' => $productId]);

    if (!$product) {
        echo "Produkt nie istnieje!";
        exit;
    }

    // Jeśli użytkownik jest zalogowany, dodaj produkt do koszyka
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $app_url = getConf()->app_url;

        // Sprawdź, czy użytkownik ma aktywne zamówienie (status = 'Pending')
        $existingOrder = getDB()->get('orders', '*', [
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
            $orderId = getDB()->insert('orders', $orderData);
        } else {
            $orderId = $existingOrder['idOrder'];
        }

        // Sprawdź, czy produkt już istnieje w zamówieniu
        $existingOrderDetail = getDB()->get('orderdetails', '*', [
            'idOrder' => $orderId,
            'idProduct' => $productId
        ]);

        if ($existingOrderDetail) {
            // Jeśli produkt już jest w zamówieniu, zaktualizuj ilość
            $newQuantity = $existingOrderDetail['quantity'] + $quantity;
            getDB()->update('orderdetails', [
                'quantity' => $newQuantity
            ], [
                'idOrderDetail' => $existingOrderDetail['idOrderDetail']
            ]);
        } else {
            // Jeśli produkt nie istnieje w zamówieniu, dodaj go
            getDB()->insert('orderdetails', [
                'idOrder' => $orderId,
                'idProduct' => $productId,
                'quantity' => $quantity,
                'unitPrice' => $product['price'],
                'idUser' => $userId
            ]);
        }

        // Oblicz cenę całkowitą zamówienia
        $orderDetails = getDB()->select('orderdetails', '*', ['idOrder' => $orderId]);
        $totalPrice = 0;
        foreach ($orderDetails as $item) {
            $totalPrice += $item['quantity'] * $item['unitPrice'];
        }

        // Zaktualizuj cenę całkowitą w zamówieniu
        getDB()->update('orders', [
            'totalPrice' => $totalPrice
        ], [
            'idOrder' => $orderId
        ]);

        echo "selected item has been added to your cart!";
    } else {
        echo "Musisz być zalogowany, aby dodać produkt do koszyka.";
    }
}

public function showCart($userId) {
    // Pobierz połączenie z bazą danych
    $db = getDB();
    
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
        $smarty = getSmarty();
        
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



    public function execute() {
        $smarty = getSmarty();

        // Assign app_url to Smarty
        $app_url = getConf()->app_url;  // Get the app URL
        $smarty->assign('app_url', $app_url);  // Pass it to the template
        
        
        $smarty->assign('role', "creator");  // Pass it to the template
        $smarty->assign('userId', "3");  // Pass it to the template
        


               if (isset($_SESSION['user_id'])) {
            $userDB = $_SESSION['username'];
            $idDB = $_SESSION['user_id'];
            $roleidDB = $_SESSION['idRole'];

                $smarty->assign("us", $userDB);
                $smarty->assign("id", $idDB);
                $smarty->assign("idRole", $roleidDB);
    
        } else {
    echo "Użytkownik nie jest zalogowany.";
}


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


if (isset($_POST['browseAllProducts'])) {
    
    
    // Ensure $conf is available here too
    $productEditCtrl = new ProductlistCtrl();
    $productEditCtrl->action_displayAll();  // Call action_productSave from the controller
    
    exit();
}


if (isset($_POST['addtocart']) && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    
    // Ensure $conf is available here too
    
    // Call the action method and pass the productId as an argument
    $productEditCtrl = new ProductListCtrl();
    $productEditCtrl->actionAddToCart($productId, 1); // Passing $productId to the method
    
    
}

if (isset($_POST['cartShow'])&& isset($_POST['userId'])) {

    $userId = $_POST['userId'];
    

    $productEditCtrl = new ProductListCtrl();
    $productEditCtrl->showCart($userId);

}