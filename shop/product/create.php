<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "Product";

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO product (name, quantity, price)
  VALUES ('$_POST[name]', '$_POST[quantity]', '$_POST[price]')";
  $conn->exec($sql);
  echo "New record created successfully";
  header("Refresh: 3; url=index.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>