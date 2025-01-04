<?php
require_once 'app/config.php';
require_once 'app/models/GameModel.php';

class GameController {

    public function index() {
        require 'app/views/game.php';
    }

    public function play() {
        header('Content-Type: application/json; charset=utf-8');

        $rawData = file_get_contents('php://input');
        $jsonData = json_decode($rawData, true);

        $playerChoice = $jsonData['choice'] ?? null;
        if (!$playerChoice) {
            echo json_encode(['error' => 'No choice provided']);
            exit;
        }

        $gameModel = new GameModel($GLOBALS['pdo']);
        $resultData = $gameModel->playGame($playerChoice);

        if (!empty($_SESSION['user_id'])) {
            $gameModel->saveScore(
                $_SESSION['user_id'],
                $resultData['player'],
                $resultData['computer'],
                $resultData['result']
            );
        }

        echo json_encode($resultData);
        exit;
    }

    public function rules() {
        require 'app/views/rules.php';
    }
}
?>
