<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>ADD CATEGORY</h1>
<form action="<?php echo URLROOT; ?>/category/add" method="post">
    Name: <input type="text" name="name" class="<?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
    <span><?php echo $data['name_err']; ?></span><br>

    Quantity: <input type="text" name="quantity" class="<?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantity']; ?>">
    <span><?php echo $data['quantity_err']; ?></span><br>

    <input type="submit">
</form>
<a href='<?php echo URLROOT; ?>/category'><button>Go Back</button></a>
 
