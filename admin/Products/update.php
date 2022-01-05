<?php
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
use Bitm\Product;

$data = $_POST;
function is_empty($value){
if ($value == ''){
return true;
}else {
    return false;
}
}
if (is_empty($data['title']))
{
    session_start();
    echo $_SESSION['message'] = "Title cant be empty";
    header('location:edit.php?id=' .$data['id']);
}else {
    $_product = new Product();
    $product=$_product->Update($data);
}
