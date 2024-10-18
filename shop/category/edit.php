<!DOCTYPE html>
<html>
  <body>
  <form action="/shop/category/update.php" method="post">
    Id: <input type="text" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>"><br>
    Name: <input type="text" name="name"><br>
    Quantity: <input type="text" name="quantity"><br>
    <input type="submit">
  </form>
  </body>
</html>