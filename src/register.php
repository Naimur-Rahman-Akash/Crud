<?php

namespace Bitm;

use PDO;
class Register{
    public $id = null;
    public $conn = null;
    public function __construct()
    {

        $this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function Store()
    {

        //echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';
        
        
        $_name = $_POST['fullname'];
        $_user = $_POST['username'];
        $_pass = $_POST['password'];
        $_email = $_POST['email'];
        $_number = $_POST['phone_number'];
        


        //Y-m-d h:i:s
        $_created_at = date('Y-m-d h:i:s', time());

        //echo $_title;
        /*echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    die ();*/
        //Connect to database


       
        $query = "INSERT INTO `user` ( `username`, `password`, `fullname`, `email`, `phone_number`, `created_at`) VALUES (:username, :password,:fullname,:email,:phone_number, :created_at);";
        $stmt = $this->conn->prepare($query);
       
        $stmt->bindParam(':username', $_user);
        $stmt->bindParam(':password', $_pass);
        $stmt->bindParam(':fullname', $_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone_number', $_number);

        $stmt->bindParam(':created_at', $_created_at);
        
        
    

        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is added Successfully,";
        } else {
            $_SESSION['message'] = "product is added Successfully,";
        }
        header("location:index.php");

        //var_dump($result);
        
    }
    public function signup_from_store($data)
    {

        //echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';
        
        
        $_name = $_POST['fullname'];
        $_user = $_POST['username'];
        $_pass = $_POST['password'];
        $_email = $_POST['email'];
        $_number = $_POST['phone_number'];
        


        //Y-m-d h:i:s
        $_created_at = date('Y-m-d h:i:s', time());

        //echo $_title;
        /*echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    die ();*/
        //Connect to database


       
        $query = "INSERT INTO `user` ( `username`, `password`, `fullname`, `email`, `phone_number`, `created_at`) VALUES (:username, :password,:fullname,:email,:phone_number, :created_at);";
        $stmt = $this->conn->prepare($query);
       
        $stmt->bindParam(':username', $_user);
        $stmt->bindParam(':password', $_pass);
        $stmt->bindParam(':fullname', $_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone_number', $_number);

        $stmt->bindParam(':created_at', $_created_at);
        
        
    

        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is added Successfully,";
        } else {
            $_SESSION['message'] = "product is added Successfully,";
        }
        header("location:http://localhost/crud/font/public/login.php");

        //var_dump($result);
        
    }
    public function Login($user_name, $password ){


       $query = "SELECT COUNT(*) AS total FROM `user` WHERE username LIKE :username AND password LIKE :password;";

       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(':username', $user_name);
        $stmt->bindParam(':password', $password);
        $result = $stmt->execute(); 
        $total = $stmt->fetch();
        if ($total['total'] > 0){

            $_SESSION['is_authenticated'] = true;
            header("location:http://localhost/crud/font/public/index.php");
        }else {
            $_SESSION['is_authenticated'] = false;
            header("location:http://localhost/crud/402.php");
        }

    }
    public function Edit($id)
    {



        //Connect to database


        $query = "SELECT * FROM `user` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $user = $stmt->fetch();
        return $user;
    }
    
    public function show($id)
    {



        //var_dump($_GET);




        //Connect to database


        $query = "SELECT * FROM `user` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $user = $stmt->fetch();
        return $user;
        //echo "<pre>";
    }
    public function index()
    {

        //Connect to database



        $query = "SELECT * FROM `user`";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $users = $stmt->fetchAll();
        return $users;
    }
    public function Update($data)
    {


        //echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';


        /*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
        //working with image
       



        $id = $data['id'];
        $_name = $data['fullname'];
        $_user = $data['username'];
        $_pass = $data['password'];
        $_email = $data['email'];
        $_number = $data['phone_number'];
        
        $_modified_at = date('Y-m-d h:i:s', time());

        //Connect to database


        $query = "UPDATE `user` SET `username` = :username, `password` = :password, `fullname` = :fullname, `email` = :email, `phone_number` = :phone_number,`modified_at`=:modified_at, WHERE `user`.`id` = :id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $_user);
        $stmt->bindParam(':password', $_pass);
        $stmt->bindParam(':fullname', $_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone_number', $_number);
        $stmt->bindParam(':modified_at', $_modified_at);
        
        
        
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is updated Successfully,";
        } else {
            $_SESSION['message'] = "product is updated Successfully,";
        }

        //var_dump($result);
        header("location:show.php");
    }
}