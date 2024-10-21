<!DOCTYPE html>
<html>
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Id: <input type="text" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>"><br>
    Name: <input type="text" name="name"><br>
    Quantity: <input type="text" name="quantity"><br>
    <input type="submit">
  </form>
  </body>
</html>

<?php
include('../category/category.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['id'],$_POST['name'], $_POST['quantity'])) {
      $category = new Category($_POST['name'], $_POST['quantity']);
      $category->update();
      header("Refresh: 3; url=list.php");
   }
  }


 