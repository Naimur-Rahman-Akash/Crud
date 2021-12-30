<?php
session_start();
$_id = $_POST['id'];
$_name = $_POST['name'];
$_email= $_POST['email'];
if(array_key_exists('is_draft',$_POST)){
    $_is_draft = $_POST['is_draft'];

}
else{
    $_is_draft = 0;
}
$_modified_at = date('Y-m-d h:i:s', time());

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `admin` SET `name` = :name,`is_draft`= :is_draft,`modified_at`= :modified_at ,`email` = :email WHERE `admin`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':name', $_name);
$stmt->bindParam(':is_draft', $_is_draft);
$stmt->bindParam('modified_at', $_modified_at);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':id', $_id);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is updated Successfully,";
}else{
    $_SESSION['message']="product is updated Successfully,";
}

//var_dump($result);
header("location:index.php");