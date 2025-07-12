<?php
session_start();
if (!isset($_SESSION["user"]))
  header("location: ./index.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un employé - Gestion des Employés</title>
  <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-dashboard.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-forms.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<?php
$page_title = "Modifier un employé";
$show_search = false;
include "./header.php";

include "./tools.php";
if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $res = detail($id)[0];
} else {
  echo "champs manquant";
}

if (isset($_POST['modifier'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $cin = $_POST['cin'];
  $date_nais = $_POST['date_nais'];
  $date_aff = $_POST['date_aff'];
  $budget = $_POST['budget'];
  $ppr = $_POST['ppr'];
  if ($ppr == "0" || $ppr == null) $ppr = null;
  $grade = $_POST['grade'];
  $echelle = $_POST['echelle'];
  $div = $_POST['aff_div'];
  $aal = $_POST['aff_aal'];
  modifier($id, $nom, $prenom, $cin, $date_nais, $date_aff, $budget, $ppr, $grade, $echelle, $div, $aal);
  header("location:page_principale.php");
}

$budgets = getbudget();
$grades = getgrade();
$echelles = getechelle();
$divisions = getdivision();
$aals = getaal();
?>

<body>
  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <div class="sidebar-logo">
          <i class="fas fa-building"></i>
          <span>Province Admin</span>
        </div>
      </div>
      
      <nav class="sidebar-nav">
        <a href="./page_principale.php" class="nav-item">
          <i class="fas fa-tachometer-alt"></i>
          Tableau de bord
        </a>
        <a href="ajoute.php" class="nav-item">
          <i class="fas fa-user-plus"></i>
          Ajouter employé
        </a>
        <a href="./page_principale.php?logout=1" class="nav-item">
          <i class="fas fa-sign-out-alt"></i>
          Se déconnecter
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Top Navigation -->
      <header class="top-nav">
        <div class="page-title">
          <h1>Modifier un employé</h1>
        </div>
        
        <div class="top-nav-actions">
          <a href="./page_principale.php" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i>
            Retour
          </a>
        </div>
      </header>

      <!-- Form Content -->
      <div class="dashboard-content">
        <div class="form-container">
          <div class="form-card">
            <div class="form-header">
              <h1><i class="fas fa-edit"></i> Modifier l'employé</h1>
              <p>Modifiez les informations de l'employé</p>
            </div>
            
            <form action="" method="POST" class="form-body">
              <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
              
              <!-- Personal Information -->
              <div class="form-section">
                <h3><i class="fas fa-user"></i> Informations personnelles</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-input" value="<?php echo htmlspecialchars($res["nom"]); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-input" value="<?php echo htmlspecialchars($res["prenom"]); ?>" />
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="cin" class="form-label">CIN</label>
                    <input type="text" id="cin" name="cin" class="form-input" value="<?php echo htmlspecialchars($res["cin"]); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="date_nais" class="form-label">Date de naissance</label>
                    <input type="date" id="date_nais" name="date_nais" class="form-input" value="<?php echo $res["date_nais"]; ?>" />
                  </div>
                </div>
              </div>

              <!-- Employment Information -->
              <div class="form-section">
                <h3><i class="fas fa-briefcase"></i> Informations d'emploi</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label for="date_aff" class="form-label">Date d'affectation</label>
                    <input type="date" id="date_aff" name="date_aff" class="form-input" value="<?php echo $res["date_aff"]; ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="ppr" class="form-label">PPR</label>
                    <input type="number" id="ppr" name="ppr" class="form-input" value="<?php echo $res["ppr"]; ?>" />
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="budget" class="form-label">Budget</label>
                    <select id="budget" name="budget" class="form-select">
                      <?php foreach ($budgets as $budget): ?>
                        <option value="<?php echo htmlspecialchars($budget['nom_bdg']); ?>" 
                                <?php echo ($budget['nom_bdg'] == $res['budget']) ? 'selected' : ''; ?>>
                          <?php echo htmlspecialchars($budget['nom_bdg']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="grade" class="form-label">Grade</label>
                    <select id="grade" name="grade" class="form-select">
                      <?php foreach ($grades as $grade): ?>
                        <option value="<?php echo htmlspecialchars($grade['nom_grd']); ?>" 
                                <?php echo ($grade['nom_grd'] == $res['grade']) ? 'selected' : ''; ?>>
                          <?php echo htmlspecialchars($grade['nom_grd']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="echelle" class="form-label">Échelle</label>
                    <select id="echelle" name="echelle" class="form-select">
                      <?php foreach ($echelles as $echelle): ?>
                        <option value="<?php echo htmlspecialchars($echelle['nom_ech']); ?>" 
                                <?php echo ($echelle['nom_ech'] == $res['echelle']) ? 'selected' : ''; ?>>
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
                      <option value="null">Aucune division</option>
                      <?php foreach ($divisions as $division): ?>
                        <option value="<?php echo htmlspecialchars($division['nom_div']); ?>" 
                                <?php echo ($division['nom_div'] == $res['aff_div']) ? 'selected' : ''; ?>>
                          <?php echo htmlspecialchars($division['nom_div']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="aff_aal" class="form-label">AAL</label>
                    <select id="aff_aal" name="aff_aal" class="form-select">
                      <option value="null">Aucun AAL</option>
                      <?php foreach ($aals as $aal): ?>
                        <option value="<?php echo htmlspecialchars($aal['nom_aal']); ?>" 
                                <?php echo ($aal['nom_aal'] == $res['aff_aal']) ? 'selected' : ''; ?>>
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
                <button type="submit" name="modifier" class="btn btn-primary">
                  <i class="fas fa-save"></i>
                  Enregistrer
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script>
    // Form validation and enhancement
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      const inputs = form.querySelectorAll('input, select');
      
      // Add visual feedback for required fields
      inputs.forEach(input => {
        if (input.hasAttribute('required')) {
          input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
              this.classList.add('error');
            } else {
              this.classList.remove('error');
            }
          });
        }
      });
      
      // Form submission with loading state
      form.addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Modification...';
        submitBtn.disabled = true;
      });
    });
  </script>
</body>
</html>