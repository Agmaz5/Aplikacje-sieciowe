<?php
class AdminController extends Controller {

    // Strona zarządzania użytkownikami
    public function users() {
        $users = $this->db->getAllUsers();
        $this->render('adminUsers.tpl', ['users' => $users]);
    }

    // Edycja roli użytkownika
    public function editRole($userId) {
        $user = $this->db->getUserById($userId);
        $roles = $this->db->getAllRoles();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleId = $_POST['roleId'];
            $this->db->updateUserRole($userId, $roleId);
            $this->redirect('/admin/users');
        }

        $this->render('adminEditRole.tpl', ['user' => $user, 'roles' => $roles]);
    }

    // Akceptacja twórcy
    public function verifyCreator($userId) {
        $this->db->updateUserRole($userId, 'Creator'); // Zmiana roli na Twórca
        $this->redirect('/admin/users');
    }

    // Usunięcie użytkownika
    public function deleteUser($userId) {
        $this->db->deleteUser($userId);
        $this->redirect('/admin/users');
    }
}
?>
