<?php
session_start();
include './tools.php';
$users = getUsers();
$email = "";
$password = "";
if (isset($_POST["email"]) && isset($_POST["mot_passe"])) {
  if (isset($users[$_POST["email"]])) {
    if ($users[$_POST["email"]]["mot_passe"] == $_POST["mot_passe"]) {
      unset($_SESSION["loginerror"]);
      $_SESSION['user'] = ['connected'];
      header("location: ./index.php");
    } else {
      $_SESSION["loginerror"] = ["password incorrect"];
      $email = $_POST["email"];
      $password = $_POST["mot_passe"];
    }
  } else {
    $_SESSION["loginerror"] = ["email incorrect"];
    $email = $_POST["email"];
    $password = $_POST["mot_passe"];
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Formulaire de connexion </title>
  <link rel="stylesheet" type="text/css" href="./css/inscription.css">
</head>

<body>
  <form method="POST" action="">
    <h2> Formulaire de connexion </h2>
    <div class="error">
      <?php
      if (isset($_SESSION['loginerror'])) {
        echo "<h4 class=\"err\">" . $_SESSION['loginerror'][0], "</h4>";
      }
      ?>
    </div>
    <table align="center">
      <tr>
        <td align="left">Email<span class="star">*</span></td>
        <td><input type="email" name="email" placeholder="votre email " value='<?php echo $email; ?>' required</td>
      </tr>
      <tr>
        <td align="left">Password<span class="star">*</span></td>
        <td><input type="password" name="mot_passe" placeholder="votre mot de passe" required></td>
      </tr>
      <tr>
        <td colspan="2"><input class="button" type="submit" name="connexion" value="Se connecter"></td>
      </tr>
    </table>
    <h4 style="text-align: center; ">
      <a href="inscription.php">S'inscrire ?</a>
    </h4>
  </form>
</body>