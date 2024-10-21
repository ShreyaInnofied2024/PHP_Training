<?php
include('../category/category.php');
$category = new Category('Apple',30);
$category->delete($_GET['id']);
header("Refresh: 3; url=../category/list.php");