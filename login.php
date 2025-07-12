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
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Gestion des Employés Provinciaux</title>
  <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <div class="login-container">
    <div class="login-card">
      <div class="login-header">
        <div class="login-logo">
          <i class="fas fa-users"></i>
        </div>
        <h1 class="login-title">Gestion des Employés</h1>
        <p class="login-subtitle">Système de gestion provincial</p>
      </div>
      
      <form method="POST" action="" class="login-form">
        <?php if (isset($_SESSION['loginerror'])): ?>
          <div class="error-message">
            <i class="fas fa-exclamation-triangle error-icon"></i>
            <?php echo $_SESSION['loginerror'][0]; ?>
          </div>
        <?php endif; ?>
        
        <div class="form-group">
          <label for="email" class="form-label">Adresse email</label>
          <div class="input-group">
            <i class="fas fa-envelope input-icon"></i>
            <input 
              type="email" 
              id="email"
              name="email" 
              class="form-input input-with-icon" 
              placeholder="votre@email.com" 
              value="<?php echo htmlspecialchars($email); ?>" 
              required
            >
          </div>
        </div>
        
        <div class="form-group">
          <label for="password" class="form-label">Mot de passe</label>
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
        
        <button type="submit" name="connexion" class="login-btn">
          <i class="fas fa-sign-in-alt"></i>
          Se connecter
        </button>
      </form>
      
      <div class="login-footer">
        <p>Pas encore de compte ? 
          <a href="inscription.php" class="login-link">S'inscrire</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>