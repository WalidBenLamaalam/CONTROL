<?php 
include "connect.php";
if (isset($_POST['submit'])) {
    extract($_POST);
    $query="INSERT into services values (null, '$nom_service','$lieu')";
    mysqli_query($con, $query) or die("erreur de requete");
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>index</title>
</head>
<body>
    <?php include "menu.php" ?>
   <div class="container mt-5">
   <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2>Add Servise</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="text" name="nom_service" placeholder="Service..." class="my-3 form-control">
                <input type="text" name="lieu" placeholder="Lieu..." class="my-3 form-control">
                <button class="btn btn-dark" name="submit">Save</button>
            </form>
        </div>
    </div>
   </div>
</body>
</html>