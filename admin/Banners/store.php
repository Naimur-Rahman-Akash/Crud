<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
$approot = $_SERVER['DOCUMENT_ROOT'].'/crud/';

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
//working with image
$filename ='IMG_'.time().'-'.$_FILES['picture']['name'];
$target = $_FILES['picture']['tmp_name'];
$destination = $approot."uploads2/".$filename;
$is_file_moved = move_uploaded_file($target, $destination);
if($is_file_moved){
    $_picture = $filename;


}else {
    $_picture = null;

}
$_title = $_POST['title'];
$_link= $_POST['link'];
$_mgs= $_POST['promo_mgs'];
if(array_key_exists('is_active',$_POST)){
    $_is_active = $_POST['is_active'];

}
else{
    $_is_active = 0;
}
$_created_at = date('Y-m-d h:i:s', time());

$conn =new PDO("mysql:host=localhost;dbname=ecommerce", 'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="INSERT INTO `banner` ( `title`, `link`,`picture`,`promo_mgs`,`is_active`,`created_at`) VALUES (:title,:link,:picture,:promo_mgs,:is_active,:created_at);"; 
$stmt = $conn->prepare($query);
//$stmt->bindParam(':title', $_title);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':created_at', $_created_at);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':promo_mgs', $_mgs);
$stmt->bindParam(':is_active', $_is_active);
$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is added Successfully,";
}else{
    $_SESSION['message']="product is added Successfully,";
}

//var_dump($result);
header("location:index.php");

