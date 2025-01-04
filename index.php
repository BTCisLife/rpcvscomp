<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'app/controllers/GameController.php';
require_once 'app/controllers/UserController.php';

$controller = $_GET['controller'] ?? 'game';
$action = $_GET['action'] ?? 'index';

if ($controller === 'game') {
    if (class_exists('GameController')) {
        $gameController = new GameController();
        if (method_exists($gameController, $action)) {
            $gameController->$action();
        } else {
            echo "404 - Action not found";
        }
    } else {
        echo "GameController class not found";
    }
} elseif ($controller === 'user') {
    if (class_exists('UserController')) {
        $userController = new UserController();
        if (method_exists($userController, $action)) {
            $userController->$action();
        } else {
            echo "404 - Action not found";
        }
    } else {
        echo "UserController class not found";
    }
} else {
    echo '404 - Controller not found';
}
?>
