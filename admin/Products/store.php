<?php

$approot = $_SERVER['DOCUMENT_ROOT']. "/crud/";
include_once ($approot. "vendor/autoload.php");
use Bitm\Product;
$_product = new Product();
$product = $_product->Store();
