<h1> EDIT PRODUCT </h1>
 <form action="<?php echo URLROOT; ?>/category/edit/<?php echo $data['id'];?>" method="post">
    Name: <input type="text" name="name" value='<?php echo $data['name'];?>'><br>
    Quantity: <input type="text" name="quantity" value='<?php echo $data['quantity'];?>'><br>
    <input type="submit">
</form>
<a href='<?php echo URLROOT; ?>/category'><button>Go Back</button></a>