<?php
session_start();
$_id = $_GET['id'];


//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM `carts` WHERE `carts`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is Deteted Successfully.";
}else{
    $_SESSION['message']="product is Deteted Successfully.";
}
//var_dump($result);
header("location:index.php");