<?php 
    include "connect.php";
    $query = "SELECT * from employe";
    $result = mysqli_query($con,$query) or die("error de requete");
    $employes = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE from employe where id = '$id'";
        mysqli_query($con, $query) or die("error de requete");
        header("location:employes.php");
        # code...
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php include "menu.php" ?>
    <div class="container mt-5 w-75">
        <h2 class="text-center text-capitalize bg-primary py-2">
            liste des eleves
        </h2>
        <a href="create.php" class="btn btn-success btn-lg">Create</a>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($employes as $employe):?>
                    <tr>
                        <td><?php echo $employe['nom_employe']?></td>
                        <td><?php echo $employe['prenom_employe']?></td>
                        <td>
                            <a onclick="return confirm('are you sure?')" href="employes.php?id=<?php echo $employe['id']?>" class="btn btn-danger">Delete</a>
                            <a href="view.php?id=<?php echo $employe['id']?>" class="btn btn-primary">View</a>
                            <a href="edit.php?id=<?php echo $employe['id']?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
            
        </table>
    </div>
</body>
</html>