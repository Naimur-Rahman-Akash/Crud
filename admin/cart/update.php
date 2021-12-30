<?php
session_start();

$_id = $_POST['id'];
$_sid = $_POST['sid'];
$_title= $_POST['product_title'];
$_qty= $_POST['qty'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `carts` SET `sid` = :sid ,`product_title` = :product_title,`qty`=:qty WHERE `carts`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);
$stmt->bindParam(':sid', $_sid);
$stmt->bindParam(':product_title', $_title);
$stmt->bindParam(':qty', $_qty);


$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is updated Successfully,";
}else{
    $_SESSION['message']="product is updated Successfully,";
}

//var_dump($result);
header("location:index.php");
