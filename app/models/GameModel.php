<?php
class GameModel {
    private $choices = ['rock', 'paper', 'scissors'];
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function playGame($playerChoice) {
        $computerChoice = $this->choices[array_rand($this->choices)];
        $result = $this->determineWinner($playerChoice, $computerChoice);
        return [
            'player'   => $playerChoice,
            'computer' => $computerChoice,
            'result'   => $result
        ];
    }

    public function saveScore($userId, $playerChoice, $computerChoice, $result) {
        $stmt = $this->pdo->prepare("
            INSERT INTO game_scores (user_id, player_choice, computer_choice, result)
            VALUES (:uid, :player, :computer, :res)
        ");
        $stmt->execute([
            ':uid'      => $userId,
            ':player'   => $playerChoice,
            ':computer' => $computerChoice,
            ':res'      => $result
        ]);
    }

    private function determineWinner($player, $computer) {
        if ($player === $computer) {
            return 'draw';
        }
        if (
            ($player === 'rock' && $computer === 'scissors') ||
            ($player === 'paper' && $computer === 'rock') ||
            ($player === 'scissors' && $computer === 'paper')
        ) {
            return 'win';
        }
        return 'lose';
    }
}
?>
