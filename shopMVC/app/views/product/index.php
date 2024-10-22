<h1>Products</h1>
<a href='<?php echo URLROOT; ?>/products/add'><button>Add</button></a>
<a href='' style='text-decoration:none;'><button>Home</button></a>
<table border="1">
<tr><th>Id</th><th>Name</th><th>Quantity</th><th>Price</th><th>Actions</th></tr>
    <?php foreach($data['products'] as $product){
        echo "<tr>";
        echo "<td>$product->id</td>";
        echo "<td>$product->name</td>";
        echo "<td>$product->quantity</td>";
        echo "<td>$product->price</td>";
        echo "<td>
            <a href=". URLROOT ."/products/edit/$product->id style='text-decoration:none;'><button>Edit</button></a>
            <a href=". URLROOT ."/products/delete/$product->id style='text-decoration:none;'><button>Delete</button></a>
            <a href=". URLROOT ."/products/show/$product->id style='text-decoration:none;'><button>View</button></a>
        </td>";
        echo "</tr>";
    }
        ?>
    </table>