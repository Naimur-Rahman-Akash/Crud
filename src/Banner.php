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

}