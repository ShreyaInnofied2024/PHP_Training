 <h1> ADD PRODUCT </h1>
 <form action="<?php echo URLROOT; ?>/products/add" method="post">
    Name: <input type="text" name="name"><br>
    Quantity: <input type="text" name="quantity"><br>
    Price:<input type="text" name="price"><br>
    Weight:<input type="text" name="weight"><br>
    <input type="submit">
</form>
<a href='<?php echo URLROOT; ?>/products'><button>Go Back</button></a>