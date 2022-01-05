<?php
namespace Bitm;
use PDO;
class Banner{

public function index(){

    session_start();
    //Connect to database
    $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $query = "SELECT * FROM `banner`";
    
    $stmt = $conn->prepare($query);
    
    $result = $stmt->execute();
    
    $banners = $stmt->fetchAll();
    return $banners;
}
public function Edit(){
    $_id = $_GET['id'];


//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `banner` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$banner = $stmt->fetch();
return $banner;
}
public function Show(){
    $_id = $_GET['id'];
//var_dump($_GET);

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `banner` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$banner = $stmt->fetch();
return $banner;
}
public function Delete(){
    session_start();
    $_id = $_GET['id'];
    
    
    //Connect to database
    $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "DELETE FROM `banner` WHERE `banner`.`id` = :id";
    
    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':id', $_id);
    
    $result = $stmt->execute();
    if ($result){
        $_SESSION['message']="product is Deteted Successfully.";
    }else{
        $_SESSION['message']="Product is Deteted Successfully.";
    }
    //var_dump($result);
    header("location:index.php");

}
}