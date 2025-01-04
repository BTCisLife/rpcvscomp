<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("
            INSERT INTO users (username, password)
            VALUES (:username, :password)
        ");
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword
        ]);
        return $this->pdo->lastInsertId();
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM users WHERE username = :username
        ");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM users WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
?>
