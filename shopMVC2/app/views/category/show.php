<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>View Category</h1>
<a href='<?php echo URLROOT; ?>/category'><button>Go Back</button></a>
<table border="1">
<tr><th>Name</th><th>Quantity</th></tr>
        <tr>
        <td><?php echo $data['category']->name; ?></td>
        <td><?php echo $data['category']->quantity; ?></td>
    </tr>
    </table>
