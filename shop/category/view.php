<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "Product";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);    //Database Connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id, name, quantity FROM category WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    // if result is present
    if (count($result) > 0) {
        echo "<table border=1px solid black>";                    //Present the output in the form of a table
        echo "<tr><th>Id</th><th>Name</th><th>Quantity</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td>";
            echo "<a href='/shop/category/index.php' style='text-decoration:none;'>
                <button>Go Back</button>
            </a>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found in the database.";       // if result not found
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
