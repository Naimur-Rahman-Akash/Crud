<?php
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
$webroot ="http://localhost/crud/";
use Bitm\Banner;
$_banner =new Banner();
$banner = $_banner->Show();
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
                    <dd class="col-md-10"><?=$banner['id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Title:</dt>
                    <dd class="col-md-10"><?=$banner['title'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Is Active:</dt>
                    <dd class="col-md-9">
                        <?php
                        echo $banner['is_active']? 'Active':'Deactived';
                        /*if ($banner['is_active']==1){
                        echo "this banner is active";
                        }else{
                            echo "this banner is not active";
                        }*/
                        ?>
                   </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Created At:</dt>
                    <dd class="col-md-9"><?=$banner['created_at'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Modified At:</dt>
                    <dd class="col-md-9"><?=$banner['modified_at'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Link:</dt>
                    <dd class="col-md-10"><?=$banner['link'];?></dd>
                </dl>
                    <dl class="row">
                    <dt class="col-md-2">picture:</dt>
                    <dd class="col-md-10">
                        <?=$banner['picture'];?>
                    <img src="<?=$webroot;?>uploads2/<?=$banner['picture'];?>"width="500px">
                    </dd>
                </dl>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Promotional Messgae:</dt>
                    <dd class="col-md-10"><?=$banner['promo_mgs'];?></dd>
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
