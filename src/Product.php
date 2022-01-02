<?php
namespace Bitm;
use PDO;

class Product{
    public $id =null;
    public $conn =null;
    public function __construct()
    {
        session_start();
        $this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
public function index(){
    
//Connect to database



$query = "SELECT * FROM `product` WHERE is_deleted=0" ;

$stmt = $this->conn->prepare($query);

$result = $stmt->execute();

$products = $stmt->fetchAll();
return $products;

}
public function show(){

    
    $_id = $_GET['id'];
    //var_dump($_GET);
    
    
    
    
    //Connect to database

    
    $query = "SELECT * FROM `product` WHERE id = :id";
    
    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':id', $_id);
    
    $result = $stmt->execute();
    
    $product = $stmt->fetch();
    return $product;
    //echo "<pre>";
}

public function Store(){
    
    //echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';
   $_picture= $this->Upload();
    
    $_title = $_POST['title'];
    $_des = $_POST['description'];
    $_type = $_POST['product_type'];
    
    if(array_key_exists('is_active',$_POST)){
        $_is_active = $_POST['is_active'];
    
    }
    else{
        $_is_active = 0;
    }
    
    if(array_key_exists('is_deleted',$_POST)){
        $_is_deleted = $_POST['is_deleted'];
    
    }
    else{
        $_is_deleted = 0;
    }
    
    //Y-m-d h:i:s
    $_created_at = date('Y-m-d h:i:s', time());
    
    //echo $_title;
    /*echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    die ();*/
    //Connect to database
   
    
    $query = "INSERT INTO `product` (`title`,`description`,`created_at`,`is_deleted`,`picture`,`product_type`,`is_active`) VALUES (:title,:description, :created_at,:is_deleted,:picture,:product_type,:is_active);";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':title', $_title);
    $stmt->bindParam(':description', $_des);
    $stmt->bindParam(':picture', $_picture);
    $stmt->bindParam(':created_at', $_created_at);
    $stmt->bindParam(':is_deleted', $_is_deleted);
    $stmt->bindParam(':product_type', $_type);
    $stmt->bindParam(':is_active', $_is_active);
    
    $result = $stmt->execute();
    if ($result){
        $_SESSION['message']="product is added Successfully,";
    }else{
        $_SESSION['message']="product is added Successfully,";
    }
    
    //var_dump($result);
    header("location:index.php");

}
public function Update(){

    
//echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';


/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
//working with image
$_picture = $this->Upload();



$_id = $_POST['id'];
$_title = $_POST['title'];
$_des = $_POST['description'];
$_type = $_POST['product_type'];
if(array_key_exists('is_active',$_POST)){
    $_is_active = $_POST['is_active'];

}
else{
    $_is_active = 0;
}
if(array_key_exists('is_deleted',$_POST)){
    $_is_deleted = $_POST['is_deleted'];

}
else{
    $_is_deleted = 0;
}
$_modified_at = date('Y-m-d h:i:s', time());

//Connect to database


$query = "UPDATE `product` SET `title` = :title,`description`= :description,`modified_at`=:modified_at,`is_deleted`=:is_deleted,`picture` = :picture,`product_type`=:product_type,`is_active` = :is_active WHERE `product`.`id` = :id;";

$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $_id);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':description', $_des);
$stmt->bindParam('modified_at', $_modified_at);
$stmt->bindParam('is_deleted', $_is_deleted);
$stmt->bindParam('picture', $_picture);
$stmt->bindParam(':product_type', $_type);
$stmt->bindParam('is_active', $_is_active);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is updated Successfully,";
}else{
    $_SESSION['message']="product is updated Successfully,";
}

//var_dump($result);
header("location:index.php");
}
public function Edit(){
    $_id = $_GET['id'];


//Connect to database


$query = "SELECT * FROM `product` WHERE id = :id";

$stmt = $this->conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$product = $stmt->fetch();
return $product;
}
public function Trash_index(){
    
    //Connect to database
    
    
    
    $query = "SELECT * FROM `product` WHERE is_deleted=1" ;
    
    $stmt = $this->conn->prepare($query);
    
    $result = $stmt->execute();
    
    $products = $stmt->fetchAll();
    return $products;
}
public function Trash(){
    
$_id = $_GET['id'];
$_is_deleted =1;


//Connect to database
;

$query = "UPDATE `product` SET `is_deleted`=:is_deleted WHERE `product`.`id` = :id;";

$stmt = $this->conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':is_deleted', $_is_deleted);
$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is Deleted Successfully.";
}else{
    $_SESSION['message']="product is not Deteted.";
}
//var_dump($result);
header("location:index.php");
}
    public function Delete(){
        
$_id = $_GET['id'];


//Connect to database


$query = "DELETE FROM `product` WHERE `product`.`id` = :id";

$stmt = $this->conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is Deteted Successfully.";
}else{
    $_SESSION['message']="product is Deteted Successfully.";
}
//var_dump($result);
header("location:index.php");
    }
    public function Restore(){

        
$_id = $_GET['id'];
$_is_deleted =0;


//Connect to database


$query = "UPDATE `product` SET `is_deleted`=:is_deleted WHERE `product`.`id` = :id;";

$stmt = $this->conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':is_deleted', $_is_deleted);
$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is Restored Successfully.";
}else{
    $_SESSION['message']="product can't be restore.";
}
//var_dump($result);
header("location:index.php");
    }
private function Upload(){
    $approot = $_SERVER['DOCUMENT_ROOT'].'/crud/';
    
    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/
    //working with image
    $_picture = null;
    if($_FILES['picture']['name']!=""){
        $filename ='IMG_'.time().'-'.$_FILES['picture']['name'];
        $target = $_FILES['picture']['tmp_name'];
        $destination = $approot."uploads/".$filename;
        $is_file_moved = move_uploaded_file($target, $destination);
        if($is_file_moved){
            $_picture = $filename;
    
    
        }else {
            if ($_POST['old_picture']){
                $_picture = $_POST['old_picture'];
            
    
        }
    }
 return $_picture;
  
}
}
}
