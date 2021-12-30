<?php
namespace Bitm;
use PDO;
class Cart{

    public function index(){
        session_start();
//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM `carts`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$carts = $stmt->fetchAll();
return $carts;

    }
    public function Show(){

        $_id = $_GET['id'];
//var_dump($_GET);

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `carts` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$cart = $stmt->fetch();
return $cart;
    }
    public function Store(){

        $_title = $_POST['sid'];
$_link= $_POST['product_title'];
$_qty= $_POST['qty'];

$conn =new PDO("mysql:host=localhost;dbname=ecommerce", 'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="INSERT INTO `carts` ( `sid`, `product_title`,`qty`) VALUES (:sid,:product_title,:qty);"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(':sid', $_title);
$stmt->bindParam(':product_title', $_link);
$stmt->bindParam(':qty', $_qty);
$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is added Successfully,";
}else{
    $_SESSION['message']="product is added Successfully,";
}

//var_dump($result);
header("location:index.php");
    }
}