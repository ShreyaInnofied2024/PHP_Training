<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>View Digital Product</h1>
<a href='<?php echo URLROOT; ?>/products'><button>Go Back</button></a>
<table border="1">
<tr><th>Name</th><th>Quantity</th><th>Price</th><th>Type</th></tr>
<?php foreach($data['products'] as $product){
        echo "<tr>";
        echo "<td>$product->id</td>";
        echo "<td>$product->name</td>";
        echo "<td>$product->quantity</td>";
        echo "<td>$product->price</td>";
    echo "</tr>";
}
    ?>
    </table>