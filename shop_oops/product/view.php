<?php
include('../product/product.php');
    $product = new Product('Apple',30,56);
    $result= $product->view($_GET['id']);
    if (count($result) > 0) {
        echo "<a href='../product/list.php' style='text-decoration:none;'>
        <button>Go Back</button>
    </a>";
        echo "<table border=1px solid black>";
        echo "<tr><th>Id</th><th>Name</th><th>Quantity</th><th>Price</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($_GET['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found in the database.";
    }