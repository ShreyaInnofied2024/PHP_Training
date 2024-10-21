<?php
include('../category/category.php');
    $category = new Category('Apple',30);
    $result= $category->view($_GET['id']);
    if (count($result) > 0) {
        echo "<a href='../category/list.php?id=" . htmlspecialchars($row['id']) . "' style='text-decoration:none;'>
                      <button>Go Back</button>
                  </a>";
        echo "<table border=1px solid black>";
        echo "<tr><th>Id</th><th>Name</th><th>Quantity</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($_GET['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found in the database.";
    }