<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>ADD PRODUCT</h1>
<form action="<?php echo URLROOT; ?>/products/add" method="post">
    Name: <input type="text" name="name" class="<?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
    <span><?php echo $data['name_err']; ?></span><br>

    Quantity: <input type="text" name="quantity" class="<?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantity']; ?>">
    <span><?php echo $data['quantity_err']; ?></span><br>

    Price: <input type="text" name="price" class="<?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
    <span><?php echo $data['price_err']; ?></span><br>

    <label for="cars">Choose a car:</label>

<select name="type" id="type" class="<?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>">
  <option value="Physical">Physical</option>
  <option value="Digital">Digital</option>
</select>
<span><?php echo $data['type_err']; ?></span>



    <input type="submit">
</form>
<a href='<?php echo URLROOT; ?>/products'><button>Go Back</button></a>