<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/crud/config.php");

use Naimur\Product;

$id = $_GET['id'];
$_product = new Product();
$products = $_product->Show($id);

?>



<!doctype html>
<html lang="en">
<?php
include_once('../views/elements/head.php');
?>

<body>
    <?php
    include_once('../views/elements/header.php');
    include_once('../views/elements/detail.php');
    include_once('../views/elements/footer.php');
    include_once('../views/elements/script.php');
    ?>

    


   
    

   

    

</body>

</html>