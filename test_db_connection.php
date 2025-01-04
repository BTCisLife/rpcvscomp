<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'app/config.php';

echo "<h1>Database Connection Test</h1>";

try {
    global $pdo;
    $stmt = $pdo->query("SELECT DATABASE()");
    $dbName = $stmt->fetchColumn();
    echo "Connected to database: " . $dbName . "<br>";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "<br>";
}
?>
