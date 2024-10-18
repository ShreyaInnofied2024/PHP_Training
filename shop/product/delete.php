<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$id = $_GET["id"];
try {
    $conn = new PDO("mysql:host=$serverName;dbname=Product", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM product WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Record deleted successfully";
    header("Refresh: 3; url=index.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

