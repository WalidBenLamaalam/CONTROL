<?php
    include "connect.php";
    $query = "SELECT *from services";
    $result = mysqli_query($con,$query)or die("error requete") ;
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_POST['submit'])) {
        extract($_POST);
        $source = $_FILES['photo']['tmp_name'];
        $destination = "photos/".$_FILES['photo']['name'];
        move_uploaded_file($source,$destination);

        $query = "INSERT into employe values(null,'$nom_employe','$prenom_employe','$fonction','$salaire','$destination','$service_id')";
        mysqli_query($con,$query)or die("error de requete");
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
             <h2 align="center" class="text-capitalize p-3 text-bg-dark">ajouter un employee</h2>
        </div>
        
        <form action="" method="post" class="container w-75"  enctype="multipart/form-data">
            <div class="row my-3">
                <div class="col-6">
                    <!--select ville // php-->
                    <select name="service_id" class="form-control">
                        <option value="">Select service</option>
                        <?php foreach($services as $service): ?>
                           <option value="<?php echo $service['id']?>"> 
                                <?php echo $service['nom_service']?>
                           </option>
                        <?php endforeach ?>
                    </select>                
                </div>
                <div class="col-6">
                    <input name="nom_employe" type="text" placeholder="Nom Employee..." class="form-control">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-6">
                    <input name="prenom_employe" type="text" placeholder="Prénom Employee..." class="form-control">
                </div>
                <div class="col-6">
                    <input name="fonction" type="text" placeholder="Fonction..." class="form-control">
                </div>
            </div>
            <div class="row my-3">
            <div class="col-6">
                    <input name="salaire" type="text" placeholder="Salaire..." class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <input enctype="multipart/form-data" type="file" name="photo" class="form-control">
                </div>
            </div>
            
                    <button class="btn btn-success" name="submit">save</button>
                
                    <a class="btn btn-danger ">cancel</a>
                
            </div>
            
        </form>
    </div>
    
</body>
</html>