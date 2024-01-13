<?php
session_start();
if(!isset($_SESSION["user"]))
    header("location: ./index.php");
?>

<?php 
if(isset($_POST["id"])){
    $id=$_POST["id"];
    try{
        $con=new PDO('mysql:host=localhost;dbname=les_employes','root','');
        $req=$con->prepare("DELETE FROM employe WHERE id=:id");
        $req->execute(["id"=>$id]);
        header("location:page_principale.php");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>