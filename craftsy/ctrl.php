<?php
require_once 'init.php';

// Rozszerzenia w aplikacji bazodanowej:
// - nowe pola dla konfiguracji połączenia z bazą danych w klasie Config
// - inicjalizacja połączenia z bazą w skrypcie init.php, za pomocą funkcji getDB() - podobnie jak dla wcześniejszych obiektów

// Do połączenia z bazą danych wykorzystujemy "maleńką" bibliotekę Medoo, która obudowuje standardowy obiekt PDO za pomocą klasy Medoo.
// Biblioteka Medoo ułatwia dostęp do bazy dla większości standardowych rodzajów zapytań, przez brak konieczności używania SQL'a.

// Jeżeli użytkownik chce jednak używać bezpośrednio PDO, to biblioteki używamy jedynie w celu połączenia z bazą, a później
// pobieramy obiekt PDO po połączeniu (metoda pdo() obiektu klasy Medoo).

getRouter()->setDefaultRoute('productList'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

// Dodajemy trasy dla kontrolerów

getRouter()->addRoute('loginShow',          'LoginCtrl'); // Wyświetlenie logowania
getRouter()->addRoute('login',              'LoginCtrl'); // Akcja logowania
getRouter()->addRoute('logout',             'LoginCtrl'); // Akcja wylogowania
getRouter()->addRoute('productNew',         'ProductAddEditCtrl');  // ['user', 'admin']); // Dodawanie nowego produktu
// Define a route for productSave
getRouter()->addRoute('productSave', 'ProductEditCtrl', 'action_productSave');

getRouter()->addRoute('productDelete',      'ProductAddEditCtrl',   ['admin']); // Usuwanie produktu
getRouter()->addRoute('orderList',          'OrderController',       ['admin']); // Lista zamówień
getRouter()->addRoute('orderDetails',       'OrderController',       ['user', 'admin']); // Szczegóły zamówienia
getRouter()->addRoute('orderSave',          'OrderController',       ['user']); // Zapisanie zamówienia
getRouter()->addRoute('commentAdd',         'CommentCtrl',           ['user']); // Dodawanie komentarza
getRouter()->addRoute('commentEdit',        'CommentCtrl',           ['user']); // Edytowanie komentarza
getRouter()->addRoute('commentDelete',      'CommentCtrl',           ['admin']); // Usuwanie komentarza
getRouter()->addRoute('profile',            'UserController',        ['user']); // Profil użytkownika
getRouter()->addRoute('productList',        'ProductListCtrl'); // Lista produktów   
getRouter()->addRoute('layout',        'layoutCtrl');

// Trasy administracyjne
getRouter()->addRoute('adminDashboard',     'AdminController',       ['admin']); // Panel administratora
getRouter()->addRoute('adminUserManagement', 'AdminController',       ['admin']); // Zarządzanie użytkownikami
getRouter()->addRoute('adminProductManagement', 'AdminController',   ['admin']); // Zarządzanie produktami

// Trasy dla koszyka
getRouter()->addRoute('cart',               'CartController',        ['user']); // Koszyk użytkownika
getRouter()->addRoute('checkout',           'CheckoutController',    ['user']); // Proces zakupu

// Trasy związane z produktami
getRouter()->addRoute('productDetail',      'ProductController',     ['user', 'admin']); // Szczegóły produktu
getRouter()->addRoute('productEdit', 'ProductEditCtrl', 'action_productEdit');





//getRouter()->addRoute('productList',        'ProductListCtrl'); // Lista produktów

// Ścieżki do szablonów
/*getRouter()->addRoute('productList',        'productList.tpl');
getRouter()->addRoute('productDetail',      'productDetail.tpl');
getRouter()->addRoute('productAddEditForm', 'productAddEditForm.tpl');
getRouter()->addRoute('productNew',         'productNew.tpl');
getRouter()->addRoute('productEdit',        'productEdit.tpl');
getRouter()->addRoute('orderDetail',        'orderDetail.tpl');
getRouter()->addRoute('orderDetails',       'orderDetails.tpl');
getRouter()->addRoute('orderHistory',       'orderHistory.tpl');
getRouter()->addRoute('checkout',           'checkout.tpl');
getRouter()->addRoute('cart',               'cart.tpl');
getRouter()->addRoute('profile',            'profile.tpl');
getRouter()->addRoute('registerShow',       'registerShow.tpl');
getRouter()->addRoute('loginShow',          'loginShow.tpl');*/

// Uruchomienie routera
getRouter()->go();



$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
$method = isset($_GET['method']) ? $_GET['method'] : null;

if ($controller && $method) {
    $class = "\\app\\controllers\\" . $controller; // Dodanie przestrzeni nazw
    echo $class;
    if (class_exists($class) && method_exists($class, $method)) {
        $instance = new $class();
        $instance->$method(); // Wywołanie metody
    } else {
        echo "Controller or method not found! <br>";
        echo "<br>";
        echo "kontroler sprawdzany " . $controller;
                echo "<br>";
        echo "methoda sprawdzana " . $method;


    }
} else {
    echo "No controller or method specified!";
}
