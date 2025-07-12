<?php
session_start();
if(!isset($_SESSION["user"]))
    header("location: ./index.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'employé - Gestion des Employés</title>
    <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
    <link rel="stylesheet" type="text/css" href="./css/modern-dashboard.css">
    <link rel="stylesheet" type="text/css" href="./css/modern-forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<?php 
    $page_title = "Détails de l'employé";
    $show_search = false;
    include "./header.php";

    include "./tools.php";
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        $res=detail($id)[0];
    }else{
        echo "champs manquant";
    }
?>

        <div class="form-container">
          <div class="form-card">
            <div class="form-header">
              <h1><i class="fas fa-user"></i> <?php echo htmlspecialchars($res["nom"] . ' ' . $res["prenom"]); ?></h1>
              <p>Informations détaillées de l'employé</p>
            </div>
            
            <div class="form-body">
              <!-- Personal Information -->
              <div class="form-section">
                <h3><i class="fas fa-user"></i> Informations personnelles</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Nom</label>
                    <div class="detail-value"><?php echo htmlspecialchars($res["nom"]); ?></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label">Prénom</label>
                    <div class="detail-value"><?php echo htmlspecialchars($res["prenom"]); ?></div>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">CIN</label>
                    <div class="detail-value"><code><?php echo htmlspecialchars($res["cin"]); ?></code></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label">Date de naissance</label>
                    <div class="detail-value"><?php echo date('d/m/Y', strtotime($res["date_nais"])); ?></div>
                  </div>
                </div>
              </div>

              <!-- Employment Information -->
              <div class="form-section">
                <h3><i class="fas fa-briefcase"></i> Informations d'emploi</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Date d'affectation</label>
                    <div class="detail-value"><?php echo date('d/m/Y', strtotime($res["date_aff"])); ?></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label">PPR</label>
                    <div class="detail-value"><?php echo $res["ppr"] ? htmlspecialchars($res["ppr"]) : '-'; ?></div>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Budget</label>
                    <div class="detail-value">
                      <span class="status-badge status-active"><?php echo htmlspecialchars($res["budget"]); ?></span>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label">Grade</label>
                    <div class="detail-value"><?php echo htmlspecialchars($res["grade"]); ?></div>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Échelle</label>
                    <div class="detail-value"><?php echo htmlspecialchars($res["echelle"]); ?></div>
                  </div>
                </div>
              </div>

              <!-- Assignment Information -->
              <div class="form-section">
                <h3><i class="fas fa-sitemap"></i> Affectation</h3>
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Division</label>
                    <div class="detail-value"><?php echo $res["aff_div"] ? htmlspecialchars($res["aff_div"]) : '-'; ?></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label">AAL</label>
                    <div class="detail-value"><?php echo $res["aff_aal"] ? htmlspecialchars($res["aff_aal"]) : '-'; ?></div>
                  </div>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="form-actions">
                <a href="./page_principale.php" class="btn btn-outline">
                  <i class="fas fa-arrow-left"></i>
                  Retour
                </a>
                <a href="modifier.php" class="btn btn-secondary" onclick="document.getElementById('editForm').submit();">
                  <i class="fas fa-edit"></i>
                  Modifier
                </a>
                <form id="editForm" action="modifier.php" method="POST" style="display: none;">
                  <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
                </form>
              </div>
            </div>
          </div>
        </div>

<?php include "./footer.php"; ?>

  <style>
    .detail-value {
      padding: var(--space-md);
      background: var(--gray-50);
      border: 1px solid var(--gray-200);
      border-radius: var(--radius-md);
      font-weight: 500;
      color: var(--gray-800);
      min-height: 44px;
      display: flex;
      align-items: center;
    }
    
    .detail-value code {
      background: var(--primary-50);
      color: var(--primary-700);
      padding: var(--space-xs) var(--space-sm);
      border-radius: var(--radius-sm);
      font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
      font-size: 0.875rem;
    }
  </style>
</body>
</html>