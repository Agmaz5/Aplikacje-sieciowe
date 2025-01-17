<?php
class ProductController extends Controller {

    // Lista produktów
    public function list() {
        // Pobranie listy produktów z bazy danych
        $products = $this->db->getProducts();
        $this->render('productList.tpl', ['products' => $products]);
    }

    // Szczegóły produktu
    public function detail($productId) {
        // Pobranie szczegółów produktu
        $product = $this->db->getProductById($productId);
        $this->render('productDetail.tpl', ['product' => $product]);
    }

    // Formularz dodawania nowego produktu
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobranie danych z formularza
            $productName = trim($_POST['productName']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $stock = trim($_POST['stock']);
            $category = trim($_POST['category']);
            $isAvailable = isset($_POST['isAvailable']) ? 1 : 0;

            // Dodanie produktu do bazy
            $productId = $this->db->addProduct($productName, $description, $price, $stock, $category, $isAvailable);

            if ($productId) {
                // Przekierowanie do listy produktów
                $this->redirect('/productList');
            } else {
                $this->render('productNew.tpl', ['error' => 'An error occurred while adding the product.']);
            }
        } else {
            // Wyświetlenie formularza dodawania produktu
            $this->render('productNew.tpl');
        }
    }

    // Edycja produktu
    public function edit($productId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobranie danych z formularza
            $productName = trim($_POST['productName']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $stock = trim($_POST['stock']);
            $category = trim($_POST['category']);
            $isAvailable = isset($_POST['isAvailable']) ? 1 : 0;

            // Zaktualizowanie produktu w bazie danych
            $updated = $this->db->updateProduct($productId, $productName, $description, $price, $stock, $category, $isAvailable);

            if ($updated) {
                // Przekierowanie do listy produktów
                $this->redirect('/productList');
            } else {
                $this->render('productEdit.tpl', ['error' => 'An error occurred while updating the product.']);
            }
        } else {
            // Pobranie danych produktu
            $product = $this->db->getProductById($productId);

            // Wyświetlenie formularza edycji
            $this->render('productEdit.tpl', ['product' => $product]);
        }
    }

    // Usuwanie produktu
    public function delete($productId) {
        // Usunięcie produktu z bazy danych
        $deleted = $this->db->deleteProduct($productId);

        if ($deleted) {
            // Przekierowanie do listy produktów
            $this->redirect('/productList');
        } else {
            $this->render('productList.tpl', ['error' => 'An error occurred while deleting the product.']);
        }
    }
}
?>
