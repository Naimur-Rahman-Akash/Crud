<?php
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
use Bitm\Product;
$id = $_GET['id'];
$_product = new Product();
$product= $_product->Trash($id);