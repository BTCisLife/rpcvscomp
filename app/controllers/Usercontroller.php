<?php
require_once 'app/config.php';
require_once 'app/models/UserModel.php';

class UserController {
    public function index() {
        header('Location: index.php?controller=user&action=login');
        exit;
    }

    public function login() {
        if (!empty($_SESSION['user_id'])) {
            header('Location: index.php?controller=game&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new UserModel($GLOBALS['pdo']);
            $user = $userModel->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?controller=game&action=index');
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        }

        require 'app/views/login.php';
    }

    public function register() {
        if (!empty($_SESSION['user_id'])) {
            header('Location: index.php?controller=game&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new UserModel($GLOBALS['pdo']);
            try {
                $userModel->register($username, $password);
                header('Location: index.php?controller=user&action=login');
                exit;
            } catch (\PDOException $e) {
                $error = "Registration failed (username might be taken).";
            }
        }

        require 'app/views/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=user&action=login');
        exit;
    }
}
?>
