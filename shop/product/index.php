
<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$dbName = "Product";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);    //Database Connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id, name, quantity, price FROM product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    // if result is present
    if (count($result) > 0) {
        echo "<a href='/shop/product/add.php' style='text-decoration:none;'>
                      <button>Add</button>
                  </a>";
                  echo "<a href='/shop/index.php' style='text-decoration:none;'>
                      <button>Home</button>
                  </a>";
        echo "<table border=1px solid black>";                    //Present the output in the form of a table
        echo "<tr><th>Id</th><th>Name</th><th>Quantity</th><th>Price</th><th>Actions</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
            echo "<td>
                  <a href='/shop/product/edit.php?id=" . htmlspecialchars($row['id']) . "' style='text-decoration:none;'>
                      <button>Edit</button>
                  </a>
                  <a href='/shop/product/delete.php?id=" . htmlspecialchars($row['id']) . "' style='text-decoration:none;'>
                      <button>Delete</button>
                  </a>
                  <a href='/shop/product/view.php?id=" . htmlspecialchars($row['id']) . "' style='text-decoration:none;'>
                      <button>View</button>
                  </a>
              </td>";
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

    
        
