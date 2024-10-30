<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('product_message'); ?>
<h1>Products</h1>
<?php if(isAdmin()){
echo "<a href='" . URLROOT . "/products/add'><button>Add</button></a>";
}
?>
<a href='<?php echo URLROOT; ?>'><button>Home</button></a>
<table border="1">
<tr><th>Id</th><th>Name</th><th>Quantity</th><th>Price</th><th>Type</th><th>Category</th><th>Actions</th></tr>
    <?php foreach($data['products'] as $product){
        echo "<tr>";
        echo "<td>$product->id</td>";
        echo "<td>$product->name</td>";
        echo "<td>$product->quantity</td>";
        echo "<td>$product->price</td>";
        echo "<td>$product->type</td>";
        echo "<td>$product->category_name</td>";
        echo "<td>";
        if(isAdmin()){
            echo "<a href=". URLROOT ."/products/edit/$product->id><button>Edit</button></a>";
            echo "<a href=". URLROOT ."/products/delete/$product->id><button>Delete</button></a>";
        }
           echo "<a href=". URLROOT ."/products/show/$product->id><button>View</button></a>";
           if(!isAdmin()){
            echo "<a href=". URLROOT ."/carts/add/$product->id><button>Add To Cart</button></a>";
           }
        echo "</td>";
        echo "</tr>";
    }
        ?>
    </table>
<a href='<?php echo URLROOT; ?>/products/digital'><button>Digital</button></a>
<a href='<?php echo URLROOT; ?>/products/physical'><button>Physical</button></a>
<?php if(isAdmin()){
    echo "<a href=". URLROOT ."/users/list><button>Get All User</button></a>";       
}



    
