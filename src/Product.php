<?php

namespace Naimur;

use PDO;

class Product
{
    public $id = null;
    public $conn = null;
    public function __construct()
    {

        $this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function index()
    {

        //Connect to database



        $query = "SELECT * FROM `product` WHERE is_deleted=0";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $products = $stmt->fetchAll();
        return $products;
    }
    public function show($id)
    {



        //var_dump($_GET);




        //Connect to database


        $query = "SELECT * FROM `product` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $product = $stmt->fetch();
        return $product;
        //echo "<pre>";
    }
    public function getActiveProduct()
    {
        $_startFrom = 0;
        $_total = 8;
        $query = "SELECT * FROM `Product` WHERE is_active = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $product = $stmt->fetchAll();

        return $product;
    }
    public function getActiveProduct2()
    {
        $_startFrom = 0;
        $_total = 4;
        $query = "SELECT * FROM `Product` WHERE is_active = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $product = $stmt->fetchAll();

        return $product;
    }
    public function getActiveProductShop()
    {
        $_startFrom = 0;
        $_total = 12;
        $query = "SELECT * FROM `Product` WHERE is_active = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $product = $stmt->fetchAll();

        return $product;
    }
    public function Store()
    {

        //echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';
        $_picture = $this->Upload();

        $_title = $_POST['title'];
        $_price = $_POST['price'];
        $_des = $_POST['description'];
        $_type = $_POST['product_type'];

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_deleted', $_POST)) {
            $_is_deleted = $_POST['is_deleted'];
        } else {
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


        $query = "INSERT INTO `product` (`title`,`price`,`description`,`created_at`,`is_deleted`,`picture`,`product_type`,`is_active`) VALUES (:title,:price,:description, :created_at,:is_deleted,:picture,:product_type,:is_active);";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':price', $_price);
        $stmt->bindParam(':description', $_des);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':created_at', $_created_at);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $stmt->bindParam(':product_type', $_type);
        $stmt->bindParam(':is_active', $_is_active);

        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is added Successfully,";
        } else {
            $_SESSION['message'] = "product is added Successfully,";
        }

        //var_dump($result);
        header("location:index.php");
    }
    public function Update($data)
    {


        //echo $_SERVER['DOCUMTENT_ROOT'].'/crud/';


        /*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
        //working with image
        $_picture = $this->Upload();



        $id = $data['id'];
        $_price = $_POST['price'];
        $_title = $data['title'];
        $_des = $data['description'];
        $_type = $data['product_type'];
        if (array_key_exists('is_active', $data)) {
            $_is_active = $data['is_active'];
        } else {
            $_is_active = 0;
        }
        if (array_key_exists('is_deleted', $data)) {
            $_is_deleted = $data['is_deleted'];
        } else {
            $_is_deleted = 0;
        }
        $_modified_at = date('Y-m-d h:i:s', time());

        //Connect to database


        $query = "UPDATE `product` SET `title` = :title,`price` = :price,`description`= :description,`modified_at`=:modified_at,`is_deleted`=:is_deleted,`picture` = :picture,`product_type`=:product_type,`is_active` = :is_active WHERE `product`.`id` = :id;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':price', $_price);
        $stmt->bindParam(':description', $_des);
        $stmt->bindParam('modified_at', $_modified_at);
        $stmt->bindParam('is_deleted', $_is_deleted);
        $stmt->bindParam('picture', $_picture);
        $stmt->bindParam(':product_type', $_type);
        $stmt->bindParam('is_active', $_is_active);

        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is updated Successfully,";
        } else {
            $_SESSION['message'] = "product is updated Successfully,";
        }

        //var_dump($result);
        header("location:index.php");
    }
    public function Edit($id)
    {



        //Connect to database


        $query = "SELECT * FROM `product` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $product = $stmt->fetch();
        return $product;
    }
    public function Trash_index()
    {

        //Connect to database



        $query = "SELECT * FROM `product` WHERE is_deleted=1";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $products = $stmt->fetchAll();
        return $products;
    }
    public function Trash($id)
    {


        $_is_deleted = 1;


            //Connect to database
        ;

        $query = "UPDATE `product` SET `is_deleted`=:is_deleted WHERE `product`.`id` = :id;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is Deleted Successfully.";
        } else {
            $_SESSION['message'] = "product is not Deteted.";
        }
        //var_dump($result);
        header("location:index.php");
    }
    public function Delete($id)
    {




        //Connect to database


        $query = "DELETE FROM `product` WHERE `product`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is Deteted Successfully.";
        } else {
            $_SESSION['message'] = "product is Deteted Successfully.";
        }
        //var_dump($result);
        header("location:index.php");
    }
    public function Restore($id)
    {



        $_is_deleted = 0;


        //Connect to database


        $query = "UPDATE `product` SET `is_deleted`=:is_deleted WHERE `product`.`id` = :id;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is Restored Successfully.";
        } else {
            $_SESSION['message'] = "product can't be restore.";
        }
        //var_dump($result);
        header("location:index.php");
    }
    private function Upload()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . '/crud/';

        /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/
        //working with image
        $_picture = null;
        if ($_FILES['picture']['name'] != "") {
            $filename = 'IMG_' . time() . '-' . $_FILES['picture']['name'];
            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot . "uploads/" . $filename;
            $is_file_moved = move_uploaded_file($target, $destination);
            if ($is_file_moved) {
                $_picture = $filename;
            }
        } else {
            if ($_POST['old_picture']) {
                $_picture = $_POST['old_picture'];
            }
        }
        return $_picture;
    }
}
