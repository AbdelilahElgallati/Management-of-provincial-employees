<?php
session_start();
include "./tools.php";
if (!isset($_SESSION["user"]))
  header("location: ./index.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/principale.css">
  <title> Gestion des employés </title>
</head>

<body>
  <header class="header">
    <nav>
      <ul>
        <div class="container">
          <div class="det">
            <li><a href="./page_principale.php?logout=1"> Se déconnecter </a></li>
            <li><a href="ajoute.php"> Ajouter </a></li>
          </div>
          <?php
          if (isset($_GET['logout'])) {
            unset($_SESSION["user"]);
            header("location:./index.php");
          }
          ?>
          <div class="search">
            <li><input type="text" placeholder="type" class="type" name="type" /></li>
            <li><input type="text" placeholder="value" class="valeur" name="keywords" /></li>
            <li><button class="recherche">rechercher</button></li>
          </div>

        </div>
      </ul>
    </nav>
  </header>
  <h1> Liste des employés</h1>
  <table>
    <thead>
      <tr>
        <th> nom </th>
        <th> prenom </th>
        <th> cin </th>
        <th> date de naissance </th>
        <th> date d'affectation </th>
        <th> budget </th>
        <th> ppr </th>
        <th> grade </th>
        <th> echelle </th>
        <th> division </th>
        <th> aal </th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody class="tbd">
      <?php
      $data = getdata();
      foreach ($data as $res) {
      ?>
        <tr>
          <td><?php echo $res["nom"] ?></td>
          <td><?php echo $res["prenom"] ?></td>
          <td><?php echo $res["cin"] ?></td>
          <td><?php echo $res["date_nais"] ?></td>
          <td><?php echo $res["date_aff"] ?></td>
          <td><?php echo $res["budget"] ?></td>
          <td><?php echo $res["ppr"] ?></td>
          <td><?php echo $res["grade"] ?></td>
          <td><?php echo $res["echelle"] ?></td>
          <td><?php echo $res["aff_div"] ?></td>
          <td><?php echo $res["aff_aal"] ?></td>
          <td>
            <form action="detail.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
              <input type="submit" value="Détail" />
            </form>
            <form action="modifier.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
              <input type="submit" value="Modifier" />
            </form>
          </td>
          <td>
            <form action="./supprimer.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
              <input type="submit" name="suprimer" value="Supprimer" />
            </form>
            <form action="./imprimer.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
              <input type="submit" target="_blank" name="imprimer" value="Imprimer" />
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="13">Liste des employés</td>
      </tr>
    </tfoot>
  </table>
  <script src="./js/principale.js"></script>
</body>

</html>