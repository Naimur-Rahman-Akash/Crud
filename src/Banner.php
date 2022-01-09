<?php

namespace Bitm;

use PDO;

class Banner
{

    public function index()
    {


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
    public function Edit($id)
    {



        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();
        return $banner;
    }
    public function Show()
    {
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
    public function Delete()
    {
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
        if ($result) {
            $_SESSION['message'] = "product is Deteted Successfully.";
        } else {
            $_SESSION['message'] = "Product is Deteted Successfully.";
        }
        //var_dump($result);
        header("location:index.php");
    }
    public function Update($data)
    {

        $approot = $_SERVER['DOCUMENT_ROOT'] . '/crud/';

        $_id = $data['id'];
        $_title = $data['title'];
        $_link = $data['link'];
        $_mgs = $data['promo_mgs'];

        if ($_FILES['picture']['name'] != "") {
            $filename = 'IMG_' . time() . '-' . $_FILES['picture']['name'];
            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot . "uploads2/" . $filename;
            $is_file_moved = move_uploaded_file($target, $destination);
            if ($is_file_moved) {
                $_picture = $filename;
            } else {
                $_picture = null;
            }
        } else {
            $_picture = $data['old_picture'];
        }
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
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE `banner` SET `title` = :title ,`modified_at`= :modified_at,`link` = :link,`is_active` = :is_active,`is_deleted`=:is_deleted,`picture` = :picture ,`promo_mgs`=:promo_mgs WHERE `banner`.`id` = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam('modified_at', $_modified_at);
        $stmt->bindParam('picture', $_picture);
        $stmt->bindParam('promo_mgs', $_mgs);
        $stmt->bindParam('is_active', $_is_active);
        $stmt->bindParam('is_deleted', $_is_deleted);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is updated Successfully,";
        } else {
            $_SESSION['message'] = "product is updated Successfully,";
        }

        //var_dump($result);
        header("location:index.php");
    }

    public function Store($data)
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . '/crud/';

        $filename = 'IMG_' . time() . '-' . $_FILES['picture']['name'];
        $target = $_FILES['picture']['tmp_name'];
        $destination = $approot . "uploads2/" . $filename;
        $is_file_moved = move_uploaded_file($target, $destination);
        if ($is_file_moved) {
            $_picture = $filename;
        } else {
            $_picture = null;
        }
        $_title = $_POST['title'];
        $_link = $_POST['link'];
        if (isset($_GET['promo_mgs'])) {
            $_mgs = $_GET['promo_mgs'];
        } else {
            $_mgs = "Name not set in GET Method";
        }
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
        $_created_at = date('Y-m-d h:i:s', time());

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO `banner` ( `title`, `link`,`picture`,`promo_mgs`,`is_active`,`is_deleted`,`created_at`) VALUES (:title,:link,:picture,:promo_mgs,:is_active,:is_deleted,:created_at);";
        $stmt = $conn->prepare($query);
        //$stmt->bindParam(':title', $_title);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':created_at', $_created_at);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':promo_mgs', $_mgs);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "product is added Successfully,";
        } else {
            $_SESSION['message'] = "product is added Successfully,";
        }

        //var_dump($result);
        header("location:index.php");
    }
 
        public function Trash_index(){
            
            //Connect to database
            
            
            
            $query = "SELECT * FROM `banner` WHERE is_deleted=1" ;
            
            $stmt = $this->conn->prepare($query);
            
            $result = $stmt->execute();
            
            $banners = $stmt->fetchAll();
            return $banners;
        }
}
