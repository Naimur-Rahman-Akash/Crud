<?php
session_start();
$_id = $_POST['id'];
$_name = $_POST['name'];
$_eamil= $_POST['email'];
$_comment= $_POST['comment'];
$_subject= $_POST['subject'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `contacts` SET `name` = :name ,`email` = :email,`comment`=:comment,`subject`=:subject WHERE `contacts`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':name', $_name);
$stmt->bindParam(':email', $_eamil);
$stmt->bindParam(':comment', $_comment);
$stmt->bindParam(':subject', $_subject);
$stmt->bindParam(':id', $_id);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is updated Successfully,";
}else{
    $_SESSION['message']="product is updated Successfully,";
}

//var_dump($result);
header("location:index.php");