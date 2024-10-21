<!DOCTYPE html>
<html>
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Name: <input type="text" name="name"><br>
    Quantity: <input type="text" name="quantity"><br>
    <input type="submit">
  </form>
  </body>
</html>

<?php
include('../category/category.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['name'], $_POST['quantity'])) {
      $category = new Category($_POST['name'], $_POST['quantity']);
      $category->add();
      header("Refresh: 3; url=../category/list.php");
   }
  }