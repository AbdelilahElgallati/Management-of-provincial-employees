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
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Gestion des Employés Provinciaux</title>
  <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <div class="login-container">
    <div class="login-card">
      <div class="login-header">
        <div class="login-logo">
          <i class="fas fa-user-plus"></i>
        </div>
        <h1 class="login-title">Créer un compte</h1>
        <p class="login-subtitle">Rejoignez le système de gestion provincial</p>
      </div>
      
      <form method="POST" action="" class="login-form">
        <div class="form-group">
          <label for="email" class="form-label required">Adresse email</label>
          <div class="input-group">
            <i class="fas fa-envelope input-icon"></i>
            <input 
              type="email" 
              id="email"
              name="email" 
              class="form-input input-with-icon" 
              placeholder="votre@email.com" 
              required
            >
          </div>
        </div>
        
        <div class="form-group">
          <label for="password" class="form-label required">Mot de passe</label>
          <div class="input-group">
            <i class="fas fa-lock input-icon"></i>
            <input 
              type="password" 
              id="password"
              name="mot_passe" 
              class="form-input input-with-icon" 
              placeholder="Votre mot de passe" 
              required
            >
          </div>
        </div>
        
        <button type="submit" name="inscription" class="login-btn">
          <i class="fas fa-user-plus"></i>
          S'inscrire
        </button>
      </form>
      
      <div class="login-footer">
        <p>Déjà un compte ? 
          <a href="login.php" class="login-link">Se connecter</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>