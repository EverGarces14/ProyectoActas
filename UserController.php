<?php
require_once 'UserModel.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function login($username, $password) {
        $user = $this->userModel->authenticateUser($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?error=Invalid credentials");
            exit();
        }
    }

    // CRUD para usuarios
    public function createUser($username, $password) {
        $this->userModel->createUser($username, $password);
        header("Location: users.php");
        exit();
    }

    public function updateUser($id, $username, $password) {
        $this->userModel->updateUser($id, $username, $password);
        header("Location: users.php");
        exit();
    }

    public function deleteUser($id) {
        $this->userModel->deleteUser($id);
        header("Location: users.php");
        exit();
    }
}

?>
