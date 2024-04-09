<?php
    $id = $_GET['id'];
    include "connect.php";
    $query = "SELECT * from employe where id = '$id' ";
    $result = mysqli_query($con,$query)or die("error de requete");
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="test.js"></script>
    
    <title>Document</title>
</head>
<body>
    <?php include "menu.php" ?>
    <div class="container d-flex justify-content-center">
        <div class="card bg-dark text-white mt-4" style="width: 24em;" >
            <div class="card-header d-flex justify-content-center py-4">
                <img src="<?php echo $row['photo'];?>" class="card-img w-50 rounded-circle" alt="<?php echo $row['photo'];?>">
            </div>
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $row['nom_employe']." ".$row['prenom_employe']?></h5>
                <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text "><?php echo $row['fonction']?></p>
                <p class="card-text "><?php echo $row['salaire']?></p>
  
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
</body>
</html>