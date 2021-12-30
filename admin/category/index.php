<?php
session_start();
//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM `category`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$categorys = $stmt->fetchAll();
/*echo "<pre>";
print_r($products);
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

    <title>List</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
<div class="fa-a text-sucess">
<?php
echo $_SESSION['message'];
$_SESSION['message']="";

?>
</div>
                    <h1 class="text-center mb-4">List</h1>
                    <ul class="nav justify-content-center fs-3">
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Add an category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($categorys) > 0) :
                                foreach ($categorys as $category) :
                            ?>
                                    <tr>
                                        <td><?= $category['name']; ?></td>
                                        <td><?= $category['is_draft']? 'Drafted': 'Not Drafted'; ?></td>
                                        <td><a href="show.php?id=<?= $category['id']; ?>"><button class="btn btn-dark">Show</button></a> | <a href="edit.php?id=<?= $category['id']; ?>">Edit</a> | <a href="delete.php?id=<?= $category['id']; ?>" onclick="return confirm('are you sure you want to delete')">Delete</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            else :
                                ?>
                                <tr>
                                    <td colspan="4">no product is available<a href="create.php">click here to add one.</a>
                                        <>td>

                                </tr>
                            <?php
                            endif;
                            ?>

                        </tbody>
                    </table>
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