<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
$approot = $_SERVER['DOCUMENT_ROOT']. "/crud/";
include_once ($approot. "vendor/autoload.php");
use Bitm\Cart;
$_cart = new Cart();
$cart = $_cart->Store();

