<?php
session_start();
if (!isset($_SESSION["user"]))
  header("location: ./index.php");
?>
<?php
include './tools.php';
$page_title = "Ajouter un employé";
$show_search = false;
include "./header.php";

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

$budgets = getbudget();
$grades = getgrade();
$echelles = getechelle();
$divisions = getdivision();
$aals = getaal();
?>

        <div class="form-container">
          <div class="form-card">
            <div class="form-header">
              <h1><i class="fas fa-user-plus"></i> Nouvel employé</h1>
              <p>Remplissez les informations de l'employé</p>
            </div>
            
            <form action="" method="POST" class="form-body">
              <!-- Personal Information -->
              <div class="form-section">
                <h3><i class="fas fa-user"></i> Informations personnelles</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label for="nom" class="form-label required">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-input" placeholder="Entrez le nom" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="prenom" class="form-label required">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-input" placeholder="Entrez le prénom" required>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="cin" class="form-label required">CIN</label>
                    <input type="text" id="cin" name="cin" class="form-input" placeholder="Entrez le CIN" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="date_nais" class="form-label required">Date de naissance</label>
                    <input type="date" id="date_nais" name="date_nais" class="form-input" required>
                  </div>
                </div>
              </div>

              <!-- Employment Information -->
              <div class="form-section">
                <h3><i class="fas fa-briefcase"></i> Informations d'emploi</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label for="date_aff" class="form-label required">Date d'affectation</label>
                    <input type="date" id="date_aff" name="date_aff" class="form-input" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="ppr" class="form-label">PPR</label>
                    <input type="number" id="ppr" name="ppr" class="form-input" placeholder="Entrez le PPR">
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="budget" class="form-label required">Budget</label>
                    <select id="budget" name="budget" class="form-select" required>
                      <option value="">Sélectionner un budget...</option>
                      <?php foreach ($budgets as $budget): ?>
                        <option value="<?php echo htmlspecialchars($budget['nom_bdg']); ?>">
                          <?php echo htmlspecialchars($budget['nom_bdg']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="grade" class="form-label required">Grade</label>
                    <select id="grade" name="grade" class="form-select" required>
                      <option value="">Sélectionner un grade...</option>
                      <?php foreach ($grades as $grade): ?>
                        <option value="<?php echo htmlspecialchars($grade['nom_grd']); ?>">
                          <?php echo htmlspecialchars($grade['nom_grd']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="echelle" class="form-label required">Échelle</label>
                    <select id="echelle" name="echelle" class="form-select" required>
                      <option value="">Sélectionner une échelle...</option>
                      <?php foreach ($echelles as $echelle): ?>
                        <option value="<?php echo htmlspecialchars($echelle['nom_ech']); ?>">
                          <?php echo htmlspecialchars($echelle['nom_ech']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Assignment Information -->
              <div class="form-section">
                <h3><i class="fas fa-sitemap"></i> Affectation</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label for="aff_div" class="form-label">Division</label>
                    <select id="aff_div" name="aff_div" class="form-select">
                      <option value=" ">Aucune division</option>
                      <?php foreach ($divisions as $division): ?>
                        <option value="<?php echo htmlspecialchars($division['nom_div']); ?>">
                          <?php echo htmlspecialchars($division['nom_div']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="aff_aal" class="form-label">AAL</label>
                    <select id="aff_aal" name="aff_aal" class="form-select">
                      <option value=" ">Aucun AAL</option>
                      <?php foreach ($aals as $aal): ?>
                        <option value="<?php echo htmlspecialchars($aal['nom_aal']); ?>">
                          <?php echo htmlspecialchars($aal['nom_aal']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Form Actions -->
              <div class="form-actions">
                <a href="./page_principale.php" class="btn btn-outline">
                  <i class="fas fa-times"></i>
                  Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i>
                  Enregistrer
                </button>
              </div>
            </form>
          </div>
        </div>

<?php include "./footer.php"; ?>


