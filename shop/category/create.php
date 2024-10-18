<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "Product";

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO category (name, quantity)
  VALUES ('$_POST[name]', '$_POST[quantity]')";
  $conn->exec($sql);
  echo "New record created successfully";
  header("Refresh: 3; url=/shop/category/index.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>