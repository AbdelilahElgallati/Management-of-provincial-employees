<?php
session_start();
include "./tools.php";
if (!isset($_SESSION["user"]))
  header("location: ./index.php");

$budgets = getbudget();
$grades = getgrade();
$echelles = getechelle();
$divisions = getdivision();
$aals = getaal();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $cin = $_POST["cin"];
  $date_nais = $_POST["date_nais"];
  $date_aff = $_POST["date_aff"];
  $budget = $_POST["budget"];
  $ppr = $_POST["ppr"];
  $grade = $_POST["grade"];
  $echelle = $_POST["echelle"];
  $division = $_POST["division"];
  $aal = $_POST["aal"];

  ajouter($nom, $prenom, $cin, $date_nais, $date_aff, $budget, $ppr, $grade, $echelle, $division, $aal);
  header("location: ./page_principale.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un employé - Gestion des Employés</title>
  <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-dashboard.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-forms.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

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
        <a href="ajoute.php" class="nav-item active">
          <i class="fas fa-user-plus"></i>
          Ajouter employé
        </a>
        <a href="#" class="nav-item">
          <i class="fas fa-chart-bar"></i>
          Statistiques
        </a>
        <a href="#" class="nav-item">
          <i class="fas fa-cog"></i>
          Paramètres
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
          <h1>Ajouter un employé</h1>
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
              <h1><i class="fas fa-user-plus"></i> Nouvel employé</h1>
              <p>Remplissez les informations de l'employé</p>
            </div>
            
            <form method="POST" action="" class="form-body">
              <!-- Personal Information -->
              <div class="form-section">
                <h3><i class="fas fa-user"></i> Informations personnelles</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label for="nom" class="form-label required">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-input" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="prenom" class="form-label required">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-input" required>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label for="cin" class="form-label required">CIN</label>
                    <input type="text" id="cin" name="cin" class="form-input" required>
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
                    <input type="number" id="ppr" name="ppr" class="form-input">
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
                    <label for="division" class="form-label">Division</label>
                    <select id="division" name="division" class="form-select">
                      <option value=" ">Aucune division</option>
                      <?php foreach ($divisions as $division): ?>
                        <option value="<?php echo htmlspecialchars($division['nom_div']); ?>">
                          <?php echo htmlspecialchars($division['nom_div']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="aal" class="form-label">AAL</label>
                    <select id="aal" name="aal" class="form-select">
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
                <button type="button" class="btn btn-outline" onclick="history.back()">
                  <i class="fas fa-times"></i>
                  Annuler
                </button>
                <button type="submit" class="btn btn-primary">
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
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
        submitBtn.disabled = true;
        
        // Simulate loading (remove in production)
        setTimeout(() => {
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
        }, 2000);
      });
    });
  </script>
</body>
</html> 