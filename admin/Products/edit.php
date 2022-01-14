<?php
$webroot ="http://localhost/crud/";


include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
use Naimur\Product;
$id = $_GET['id'];

$_product = new Product();
$product= $_product->Edit($id);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="fs-4 text-danger">
<?php


echo $_SESSION['message'];
$_SESSION['message']="";

?>
</div>
                <h1 class="text-center mb-4">Edit</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value="<?=$product['id'];?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Title:</label>
                        <div class="col-md-10">
                            <input
                                type="text"
                                class="form-control"
                                id="inputTitle"
                                name="title"
                                value="<?=$product['title'];?>">
                        </div>
                        </div>
                        <div class="mb-2 row">
                        <label for="inputPrice" class="col-md-3 col-form-label">price:</label>
                        <div class="col-md-10">
                            <input
                                type="number"
                                class="form-control"
                                id="inputPirce"
                                name="price"
                                value="<?=$product['price'];?>">
                        </div>
                        </div>
                        <div class="mb-2 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Description:</label>
                        <div class="col-md-10">
                            <input
                                type="text"
                                class="form-control"
                                id="inputDescription"
                                name="description"
                                value="<?=$product['description'];?>">
                        </div>
                        </div>
                        <div class="mb-2 row from-check ">
                        
                        <div class="col-md-10">
                            <?php
                            if($product['is_active']==1){
                            ?>
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="inputIsActive"
                                    name="is_active"
                                    value="1"
                                    checked>
                                    <?php
                                    }else{
                                    ?>
                                    <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="inputIsActive"
                                    name="is_active"
                                    value="1" 
                                    >
                                    <?php
                                    }
                                    ?>
                        
                        <label for="inputIsActive" class=" col-md-3 form-check-label">Is Active:</label>
                    </div>
                    </div>
                    <div class="mb-2 row from-check ">
                        
                        <div class="col-md-10">
                            <?php
                            if($product['is_deleted']==1){
                            ?>
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="inputIsDeleted"
                                    name="is_deleted"
                                    value="1"
                                    checked>
                                    <?php
                                    }else{
                                    ?>
                                    <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="inputIsDeleted"
                                    name="is_deleted"
                                    value="1" 
                                    >
                                    <?php
                                    }
                                    ?>
                        
                        <label for="inputIsDeleted" class=" col-md-3 form-check-label">Is Deleted:</label>
                    </div>
                    </div>
                        <div class="mb-2 row">
                            <label for="inputFile" class="col-md-3 col-form-label">Picture:</label>
                            <div class="col-md-10">
                                <input
                                        type="file"
                                        class="form-control"
                                        id="inputFile"
                                        name="picture"
                                        value="<?=$product['picture'];?>">
                            </div>
                            <img src="<?=$webroot;?>uploads/<?=$product['picture'];?>"width="400px">
                            <input type="hidden" name ="old_picture" value="<?=$product['picture'];?>">
                    </div>
                    <div class="mb-2 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Product Type:</label>
                    <div class="col-md-10">
                            <input
                                type="text"
                                class="form-control"
                                id="inputProductType"
                                name="product_type"
                                value="<?=$product['product_type'];?>">
                        </div>
                        </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>



                </form>


            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
