<?php 
    $id = $_GET['id'];
    include "connect.php";
    $query = "SELECT * from employe where id = '$id' ";
    $result = mysqli_query($con,$query) or die("error de requete");
    $row = mysqli_fetch_assoc($result);

    $query = "SELECT *from services";
    $result = mysqli_query($con,$query)or die("error requete") ;
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_POST['submit'])) {
        extract($_POST);
        $query="UPDATE employe set nom_employe = '$nom_employe', prenom_employe = '$prenom_employe',fonction = '$fonction', salaire = '$salaire', service_id = '$service_id' where id ='$id'";
        mysqli_query($con, $query) or die("error de requete");
        header("location:employes.php");
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

    <div class="container mt-3">
        <div>
             <h2 align="center" class="text-capitalize p3 text-bg-dark">edit un habitant</h2>
        </div>
       <div>
       <form action="" method="post" class="container w-75"  enctype="multipart/form-data">
            <div class="row my-3">
                <div class="col-6">
                    <!--select ville // php-->
                    <select name="service_id" class="form-control" value="<?php echo $row['service_id']?>">
                        <option value="">Select service</option>
                        <?php foreach($services as $service): ?>
                           <option <?php if ($row['service_id']==$service['id']) echo 'selected'?> value="<?php echo $service['id']?>"> 
                                <?php echo $service['nom_service']?>
                           </option>
                        <?php endforeach ?>
                    </select>                
                </div>
                <div class="col-6">
                    <input value="<?php echo $row['nom_employe']?>" name="nom_employe" type="text" placeholder="Nom Employee..." class="form-control">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-6">
                    <input value="<?php echo $row['prenom_employe']?>" name="prenom_employe" type="text" placeholder="Prénom Employee..." class="form-control">
                </div>
                <div class="col-6">
                    <input value="<?php echo $row['fonction']?>" name="fonction" type="text" placeholder="Fonction..." class="form-control">
                </div>
            </div>
            <div class="row my-3">
            <div class="col-6">
                    <input value="<?php echo $row['salaire']?>" name="salaire" type="text" placeholder="Salaire..." class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <input enctype="multipart/form-data" type="file" name="photo" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <button class="btn btn-success px-4" name="submit">save</button>
                </div>
                <div>
                    <a class="btn btn-outline-danger px-4">cancel</a>
                </div>
            </div>
            
        </form>
       </div>
    </div>
    
</body>
</html>