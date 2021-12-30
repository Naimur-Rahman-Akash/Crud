<?php
$approot = $_SERVER['DOCUMENT_ROOT'].'/crud/';

session_start();
$_id = $_POST['id'];
$_title = $_POST['title'];
$_link= $_POST['link'];
$_mgs= $_POST['promo_mgs'];
if($_FILES['picture']['name']!=""){
    $filename ='IMG_'.time().'-'.$_FILES['picture']['name'];
    $target = $_FILES['picture']['tmp_name'];
    $destination = $approot."uploads2/".$filename;
    $is_file_moved = move_uploaded_file($target, $destination);
    if($is_file_moved){
        $_picture = $filename;


    }else {
        $_picture = null;

    }
}else{
    $_picture= $_POST['old_picture'];
}
if(array_key_exists('is_active',$_POST)){
    $_is_active = $_POST['is_active'];

}
else{
    $_is_active = 0;
}
$_modified_at = date('Y-m-d h:i:s', time());

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `banner` SET `title` = :title ,`modified_at`= :modified_at,`link` = :link,`picture` = :picture ,`promo_mgs`=:promo_mgs WHERE `banner`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam('modified_at', $_modified_at);
$stmt->bindParam('picture', $_picture);
$stmt->bindParam('promo_mgs', $_mgs);
$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is updated Successfully,";
}else{
    $_SESSION['message']="product is updated Successfully,";
}

//var_dump($result);
header("location:index.php");