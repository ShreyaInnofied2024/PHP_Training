<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>View Product</h1>
<a href='<?php echo URLROOT; ?>/products'><button>Go Back</button></a>
<table border="1">
<tr><th>Name</th><th>Quantity</th><th>Price</th></tr>
        <tr>
        <td><?php echo $data['product']->name; ?></td>
        <td><?php echo $data['product']->quantity; ?></td>
        <td><?php echo $data['product']->price; ?></td>
    </tr>
    </table>

    