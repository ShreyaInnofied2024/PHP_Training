<?php
include('../product/product.php');
$product = new Product('Apple',30,56);
$product->delete($_GET['id']);
header("Refresh: 3; url=list.php");