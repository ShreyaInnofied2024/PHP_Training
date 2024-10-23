<h1>View Product</h1>
<a href='<?php echo URLROOT; ?>/category'><button>Go Back</button></a>
<table border="1">
<tr><th>Name</th><th>Quantity</th></tr>
        <tr>
        <td><?php echo $data['product']->name; ?></td>
        <td><?php echo $data['product']->quantity; ?></td>
    </tr>
    </table>