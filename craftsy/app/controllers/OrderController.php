<?php
class OrderController extends Controller {

    // Historia zamówień użytkownika
    public function history() {
        // Pobranie zamówień użytkownika z bazy danych
        $userId = $this->getUserId(); // Załóżmy, że metoda getUserId() pobiera ID zalogowanego użytkownika
        $orders = $this->db->getOrdersByUserId($userId);
        $this->render('orderHistory.tpl', ['orders' => $orders]);
    }

    // Szczegóły zamówienia
    public function detail($orderId) {
        // Pobranie szczegółów zamówienia
        $order = $this->db->getOrderById($orderId);
        $orderDetails = $this->db->getOrderDetails($orderId);
        $this->render('orderDetail.tpl', ['order' => $order, 'orderDetails' => $orderDetails]);
    }

    // Proces składania zamówienia
    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobranie danych z formularza
            $deliveryAddress = trim($_POST['deliveryAddress']);
            $userId = $this->getUserId(); // Załóżmy, że metoda getUserId() pobiera ID zalogowanego użytkownika
            $cartItems = $this->getCartItems($userId); // Pobranie przedmiotów w koszyku

            // Przeszukiwanie koszyka, obliczanie całkowitej ceny, itd.
            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item['unitPrice'] * $item['quantity'];
            }

            // Tworzenie nowego zamówienia
            $orderId = $this->db->createOrder($userId, $totalPrice, $deliveryAddress);

            // Dodanie szczegółów zamówienia do bazy danych
            foreach ($cartItems as $item) {
                $this->db->createOrderDetail($orderId, $item['idProduct'], $item['quantity'], $item['unitPrice']);
            }

            // Przekierowanie do historii zamówień
            $this->redirect('/orderHistory');
        } else {
            // Wyświetlenie formularza zamówienia
            $this->render('checkout.tpl');
        }
    }

    // Pomocnicza metoda do pobrania ID zalogowanego użytkownika
    private function getUserId() {
        // Załóżmy, że istnieje metoda w bazie danych, która pobiera zalogowanego użytkownika
        return isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
    }

    // Pomocnicza metoda do pobrania przedmiotów w koszyku
    private function getCartItems($userId) {
        // Pobranie przedmiotów w koszyku użytkownika
        return $this->db->getCartItems($userId);
    }
}
?>
