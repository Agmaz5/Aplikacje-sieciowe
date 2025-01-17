<?php
class UserController extends Controller {
    // Rejestracja nowego użytkownika
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Walidacja danych
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $passwordConfirm = trim($_POST['passwordConfirm']);

            if ($password !== $passwordConfirm) {
                // Hasła się nie zgadzają
                $this->render('registerShow.tpl', ['error' => 'Passwords do not match.']);
                return;
            }

            // Sprawdzenie czy użytkownik o takim e-mail już istnieje
            if ($this->db->getUserByEmail($email)) {
                $this->render('registerShow.tpl', ['error' => 'Email is already in use.']);
                return;
            }

            // Dodanie nowego użytkownika do bazy
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userId = $this->db->addUser($username, $email, $hashedPassword);

            if ($userId) {
                // Rejestracja zakończona sukcesem
                $this->redirect('/login');
            } else {
                $this->render('registerShow.tpl', ['error' => 'An error occurred during registration.']);
            }
        } else {
            // Wyświetlenie formularza rejestracji
            $this->render('registerShow.tpl');
        }
    }

    // Logowanie użytkownika
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            // Sprawdzenie czy użytkownik istnieje
            $user = $this->db->getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                // Ustawienie sesji
                $_SESSION['user_id'] = $user['idUser'];
                $_SESSION['role'] = $user['idRole'];
                $this->redirect('/');
            } else {
                $this->render('loginShow.tpl', ['error' => 'Invalid email or password.']);
            }
        } else {
            // Wyświetlenie formularza logowania
            $this->render('loginShow.tpl');
        }
    }

    // Wylogowanie użytkownika
    public function logout() {
        session_destroy();
        $this->redirect('/');
    }

    // Edycja profilu użytkownika
    public function editProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobranie i walidacja danych
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $deliveryAddress = trim($_POST['deliveryAddress']);

            // Aktualizacja danych użytkownika
            $userId = $_SESSION['user_id'];
            $this->db->updateUserProfile($userId, $username, $email, $deliveryAddress);

            // Zaktualizowanie sesji
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            $this->redirect('/profile');
        } else {
            // Pobranie danych użytkownika
            $userId = $_SESSION['user_id'];
            $user = $this->db->getUserById($userId);

            // Wyświetlenie formularza edycji
            $this->render('profile.tpl', ['user' => $user]);
        }
    }

    // Zmiana hasła
    public function changePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = trim($_POST['currentPassword']);
            $newPassword = trim($_POST['newPassword']);
            $newPasswordConfirm = trim($_POST['newPasswordConfirm']);

            // Sprawdzamy czy nowe hasła się zgadzają
            if ($newPassword !== $newPasswordConfirm) {
                $this->render('profile.tpl', ['error' => 'New passwords do not match.']);
                return;
            }

            // Sprawdzamy czy obecne hasło jest poprawne
            $userId = $_SESSION['user_id'];
            $user = $this->db->getUserById($userId);
            if (!password_verify($currentPassword, $user['password'])) {
                $this->render('profile.tpl', ['error' => 'Current password is incorrect.']);
                return;
            }

            // Zmieniamy hasło
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->db->updatePassword($userId, $hashedPassword);
            
            $this->redirect('/profile');
        } else {
            // Wyświetlenie formularza zmiany hasła
            $this->render('profile.tpl');
        }
    }
}
?>
