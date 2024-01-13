<?php
session_start();
if (!isset($_SESSION["user"]))
  header("location: ./index.php");
?>
<?php
include './tools.php';
if (
  isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["cin"]) && isset($_POST["date_nais"])
  && isset($_POST["date_aff"]) && isset($_POST["budget"]) && isset($_POST["grade"]) && isset($_POST["echelle"])
) {
  ajouter(
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["cin"],
    $_POST["date_nais"],
    $_POST["date_aff"],
    $_POST["budget"],
    $_POST["ppr"],
    $_POST["grade"],
    $_POST["echelle"],
    $_POST["aff_div"],
    $_POST["aff_aal"]
  );
  header("location:page_principale.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>formulaire d'ajoute</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>

<body>
  <div class="form-container">
    <header class="header">
      <nav>
        <ul>
          <li><a href="./page_principale.php">Accueil</a></li>
        </ul>
      </nav>
    </header>

    <div class="form-wrapper">
      <form action="" method="POST" class="form">
        <h2>Formulaire d'ajout</h2>

        <div class="form-section">
          <label for="nom">Nom<span class="star">*</span></label>
          <input class="input" type="text" placeholder="Entrez le nom" name="nom" id="nom" required>

          <label for="prenom">Prenom<span class="star">*</span></label>
          <input class="input" type="text" disabled placeholder="Entrez le prenom" name="prenom" id="prenom" required>

          <label for="CIN">CIN<span class="star">*</span></label><br>
          <input class="input" type="text" disabled placeholder=" entrez le CIN " name="cin" id="cin" required>

          <label for="date_nais">date de naissance<span class="star">*</span></label><br>
          <input class="input" disabled type="date" placeholder=" entrez la de de naissance " name="date_nais" id="date_nais" required>

          <label for="date_aff">date d'affectation<span class="star">*</span></label><br>
          <input class="input" disabled type="date" placeholder=" entrez la date d'affectation " name="date_aff" id="date_aff" required>

          <label for="budget">budget<span class="star">*</span></label><br>
          <select class="input" disabled id="budget" name="budget" required>
            <option value=""></option>
            <?php
            $bd = getbudget();
            foreach ($bd as $b) {
              echo '<option value=' . $b['nom_bdg'] . '>' . $b['nom_bdg'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="form-section">
          <label for="PPR">PPR</label>
          <input class="input" disabled type="number" placeholder="Entrez le PPR" name="ppr" id="ppr">

          <label for="grade">Grade<span class="star">*</span></label>
          <select class="input" disabled id="grade" name="grade" required>
            <option value=""></option>
            <?php
            $grades = getgrade();
            foreach ($grades as $grade) {
              echo '<option value="' . $grade['nom_grd'] . '">' . $grade['nom_grd'] . '</option>';
            }
            ?>
          </select>

          <label for="echelle">Echelle<span class="star">*</span></label><br>
          <select class="input" disabled id="echelle" name="echelle" required>
            <option value=""></option>
            <?php
            $echel = getechelle();
            foreach ($echel as $ech) {
              echo '<option value="' . $ech['nom_ech'] . '">' . $ech['nom_ech'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="form-section">
          <label>Affectation : <span class="star">*</span></label>
          <input type="radio" disabled name="aff" id="div" class="radio" value="division" />Division
          <input type="radio" disabled name="aff" id="aal" class="radio" value="aal" />AAL

          <label for="aff_div">Division</label>
          <select class="input" disabled id="aff_div" name="aff_div">
            <option value=""></option>
            <?php
            $divisions = getdivision();
            foreach ($divisions as $division) {
              echo '<option value="' . $division['nom_div'] . '">' . $division['nom_div'] . '</option>';
            }
            ?>
          </select>

          <label for="aff_aal">AAL</label>
          <select class="input" disabled id="aff_aal" name="aff_aal">
            <option value=""></option>
            <?php
            $aals = getaal();
            foreach ($aals as $aal) {
              echo '<option value="' . $aal['nom_aal'] . '">' . $aal['nom_aal'] . '</option>';
            }
            ?>
          </select>


        </div>

        <div class="button">
          <input type="submit" value="Envoyer">
        </div>
      </form>
    </div>
  </div>
  <script src="./js/main.js"></script>
</body>

</html>


