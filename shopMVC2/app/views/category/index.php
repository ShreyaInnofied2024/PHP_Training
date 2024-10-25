<?php flash('category_message'); ?>
<h1>Categories</h1>
<a href='<?php echo URLROOT; ?>/category/add'><button>Add</button></a>
<a href='<?php echo URLROOT; ?>'><button>Home</button></a>
<table border="1">
<tr><th>Id</th><th>Name</th><th>Quantity</th><th>Actions</th></tr>
    <?php foreach($data['products'] as $product){
        echo "<tr>";
        echo "<td>$product->id</td>";
        echo "<td>$product->name</td>";
        echo "<td>$product->quantity</td>";
        echo "<td>
            <a href=". URLROOT ."/category/edit/$product->id style='text-decoration:none;'><button>Edit</button></a>
            <a href=". URLROOT ."/category/delete/$product->id style='text-decoration:none;'><button>Delete</button></a>
            <a href=". URLROOT ."/category/show/$product->id style='text-decoration:none;'><button>View</button></a>
        </td>";
        echo "</tr>";
    }
        ?>
    </table>