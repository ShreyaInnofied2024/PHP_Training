<?php 
class Database {
    private $conn;

    public function __construct($serverName = "localhost", $userName = "root", $password = "password", $dbName = "Products") {
        try {
            $this->conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function executeQuery($query, $params = []) {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
    }

    public function __destruct() {
        $this->conn = null;
    }
}