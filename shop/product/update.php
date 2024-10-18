<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$id = $_POST["id"];
$name = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
try {
    $conn = new PDO("mysql:host=$serverName;dbname=Products", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE product SET name = :name, quantity = :quantity, price = :price WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();
    echo "Record updated successfully";
    header("Refresh: 3; url=index.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;