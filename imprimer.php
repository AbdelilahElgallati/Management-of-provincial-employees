<?php
session_start();
if(!isset($_SESSION["user"]))
    header("location: ./index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information d'imprimer</title>
    <link rel="stylesheet" type="text/css" href="./css/imprimer.css">
</head>
<?php 
    include "./tools.php";
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        $res=detail($id)[0];
    }else{
        echo "champs manquant";
    }
?>

<body onload="window.print()">
    <div class="form-container">
        <div class="form-wrapper">
            <form action="" method="POST" class="form">
                <input type="hidden" name="id" value="<?php echo $res["id"] ; ?>">
                <h2> Information </h2>
                <div class="form-section">
                    <h3 for="nom">Nom</h3>
                    <p><?php echo $res["nom"] ;?></p>
                    <h3 for="prenom">Prenom</h3>
                    <p><?php echo $res["prenom"] ;?></p>
                    <h3 for="CIN">CIN</h3>
                    <p><?php echo $res["cin"] ;?></p>
                    <h3 for="date_naissance">date de naissance</h3>
                    <p><?php echo $res["date_nais"] ;?></p>
                    <h3 for="date_affectation">date d'affectation</h3>
                    <p><?php echo $res["date_aff"] ;?></p>
                    <h3 for="budget">budget</h3>
                    <p><?php echo $res["budget"] ;?></p>
                </div>
                <div class="form-section">
                    <h3 for="PPR">PPR</h3>
                    <p><?php echo $res["ppr"] ;?></p>
                    <h3 for="grade">Grade</h3>
                    <p><?php echo $res["grade"] ;?></p>
                    <h3 for="echelle">Echelle</h3>
                    <p><?php echo $res["echelle"] ;?></p>
                    <h3 for="division">Division</h3>
                    <p><?php echo $res["aff_div"] ;?></p>
                    <h3 for="aal">AAL</h3>
                    <p><?php echo $res["aff_aal"] ;?></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>