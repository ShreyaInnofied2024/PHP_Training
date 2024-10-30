<?php
// session_start();
// error_reporting(E_ALL);
// ini_set('display_errors',1);
require_once '../app/bootstrap.php';

// public/index.php (example routing)
if ($_SERVER['REQUEST_URI'] === '/carts/add') {
    $controller = new Carts();
    $controller->add($_GET['id']);
}


// Init Core Library
$init=new Core();