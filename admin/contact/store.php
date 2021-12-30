<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
$_name = $_POST['name'];
$_email= $_POST['email'];
$_comment= $_POST['comment'];
$_subject= $_POST['subject'];

$conn =new PDO("mysql:host=localhost;dbname=ecommerce", 'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="INSERT INTO `contacts` ( `name`, `email`,`comment`,`subject`) VALUES (:name,:email,:comment,:subject);"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(':name', $_name);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':comment', $_comment);
$stmt->bindParam(':subject', $_subject);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is added Successfully,";
}else{
    $_SESSION['message']="product is added Successfully,";
}

//var_dump($result);
header("location:index.php");

