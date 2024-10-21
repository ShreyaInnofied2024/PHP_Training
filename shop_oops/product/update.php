<!DOCTYPE html>
<html>
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Id: <input type="text" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>"><br>
    Name: <input type="text" name="name"><br>
    Quantity: <input type="text" name="quantity"><br>
    Price:<input type="text" name="price"><br>
    <input type="submit">
  </form>
  </body>
</html>

<?php
include('../product/product.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['id'],$_POST['name'], $_POST['quantity'], $_POST['price'])) {
      $product = new Product($_POST['name'], $_POST['quantity'], $_POST['price']);
      $product->update();
      header("Refresh: 3; url=list.php");
   }
  }


 