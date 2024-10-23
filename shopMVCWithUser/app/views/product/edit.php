<h1> EDIT PRODUCT </h1>
 <form action="<?php echo URLROOT; ?>/products/edit/<?php echo $data['id'];?>" method="post">
    Name: <input type="text" name="name" value='<?php echo $data['name'];?>'><br>
    Quantity: <input type="text" name="quantity" value='<?php echo $data['quantity'];?>'><br>
    Price:<input type="text" name="price" value='<?php echo $data['price'];?>'><br>
    <input type="submit">
</form>
<a href='<?php echo URLROOT; ?>/products'><button>Go Back</button></a>