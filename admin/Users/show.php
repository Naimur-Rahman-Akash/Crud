<?php
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
$webroot ="http://localhost/crud/";
use Bitm\Register;
$id = $_GET['id'];
$_user =new Register();
$user = $_user->Show($id);
/*echo "<pre>";
print_r($banner);
echo "</pre>";*/

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Show</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Show</h1>

                <dl class="row">
                    <dt class="col-md-2">ID:</dt>
                    <dd class="col-md-10"><?=$user['id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">user:</dt>
                    <dd class="col-md-10"><?=$user['username'];?></dd>
                </dl>
               
                <dl class="row">
                    <dt class="col-md-3">Created At:</dt>
                    <dd class="col-md-9"><?=$user['created_at'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Full Name:</dt>
                    <dd class="col-md-9"><?=$user['fullname'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Email:</dt>
                    <dd class="col-md-10"><?=$user['email'];?></dd>
                
                <dl class="row">
                    <dt class="col-md-2">Phone Number:</dt>
                    <dd class="col-md-10"><?=$user['phone_number'];?></dd>
                </dl>
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