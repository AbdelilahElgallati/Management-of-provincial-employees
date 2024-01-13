<?php
include_once './tools.php';
if (isset($_POST["email"]) && isset($_POST["mot_passe"])) {
  $email = $_POST["email"];
  $password = $_POST["mot_passe"];
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("INSERT INTO login (email,mot_passe) value (:email,:password);");
    $req->execute(["email" => $email, "password" => $password]);
    header("location:login.php");
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> Formulaire d'inscription </title>
  <link rel="stylesheet" type="text/css" href="./css/inscription.css">
</head>

<body>
  <form method="POST" action="">
    <h2> formulaire d'inscription </h2>
    <table align="center">
      <tr>
        <td align="left">Email<span class="star">*</span></td>
        <td><input type="email" name="email" placeholder="votre email " required></td>
      </tr>
      <tr>
        <td align="left">Password<span class="star">*</span></td>
        <td><input type="password" name="mot_passe" placeholder=" votre mot de passe" required></td>
      </tr>
      <tr>
        <td colspan="2"><input class="button" type="submit" name="inscription" value="inscription"></td>
      </tr>
    </table>
  </form>
</body>

</html>