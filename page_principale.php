<?php
$page_title = "Liste des employés";
$show_search = true;
include "./header.php";
?>

        <!-- Stats Cards -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-header">
              <div>
                <div class="stat-value"><?php echo count(getdata()); ?></div>
                <div class="stat-label">Total Employés</div>
              </div>
              <div class="stat-icon primary">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="stat-change positive">
              <i class="fas fa-arrow-up"></i> +12% ce mois
            </div>
          </div>
          
          <div class="stat-card">
            <div class="stat-header">
              <div>
                <div class="stat-value">4</div>
                <div class="stat-label">Divisions</div>
              </div>
              <div class="stat-icon secondary">
                <i class="fas fa-sitemap"></i>
              </div>
            </div>
            <div class="stat-change positive">
              <i class="fas fa-arrow-up"></i> +1 cette année
            </div>
          </div>
          
          <div class="stat-card">
            <div class="stat-header">
              <div>
                <div class="stat-value">25</div>
                <div class="stat-label">AAL</div>
              </div>
              <div class="stat-icon success">
                <i class="fas fa-map-marker-alt"></i>
              </div>
            </div>
            <div class="stat-change positive">
              <i class="fas fa-arrow-up"></i> +3 cette année
            </div>
          </div>
          
          <div class="stat-card">
            <div class="stat-header">
              <div>
                <div class="stat-value">98%</div>
                <div class="stat-label">Taux de présence</div>
              </div>
              <div class="stat-icon warning">
                <i class="fas fa-calendar-check"></i>
              </div>
            </div>
            <div class="stat-change positive">
              <i class="fas fa-arrow-up"></i> +2% ce mois
            </div>
          </div>
        </div>

        <!-- Employee Data Table -->
        <div class="data-section">
          <div class="data-header">
            <div class="data-title">
              <i class="fas fa-list"></i>
              Liste des employés
            </div>
            <div class="data-actions">
              <a href="ajoute.php" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Ajouter
              </a>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="modern-table">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>CIN</th>
                  <th>Date de naissance</th>
                  <th>Date d'affectation</th>
                  <th>Budget</th>
                  <th>PPR</th>
                  <th>Grade</th>
                  <th>Échelle</th>
                  <th>Division</th>
                  <th>AAL</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="tbd">
                <?php
                $data = getdata();
                foreach ($data as $res) {
                ?>
                  <tr>
                    <td><strong><?php echo htmlspecialchars($res["nom"]); ?></strong></td>
                    <td><?php echo htmlspecialchars($res["prenom"]); ?></td>
                    <td><code><?php echo htmlspecialchars($res["cin"]); ?></code></td>
                    <td><?php echo date('d/m/Y', strtotime($res["date_nais"])); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($res["date_aff"])); ?></td>
                    <td>
                      <span class="status-badge status-active"><?php echo htmlspecialchars($res["budget"]); ?></span>
                    </td>
                    <td><?php echo $res["ppr"] ? htmlspecialchars($res["ppr"]) : '-'; ?></td>
                    <td><?php echo htmlspecialchars($res["grade"]); ?></td>
                    <td><?php echo htmlspecialchars($res["echelle"]); ?></td>
                    <td><?php echo $res["aff_div"] ? htmlspecialchars($res["aff_div"]) : '-'; ?></td>
                    <td><?php echo $res["aff_aal"] ? htmlspecialchars($res["aff_aal"]) : '-'; ?></td>
                    <td>
                      <div class="action-buttons">
                        <form action="detail.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
                          <button type="submit" class="btn btn-outline btn-sm">
                            <i class="fas fa-eye"></i>
                          </button>
                        </form>
                        
                        <form action="modifier.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
                          <button type="submit" class="btn btn-secondary btn-sm">
                            <i class="fas fa-edit"></i>
                          </button>
                        </form>
                        
                        <form action="./supprimer.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
                          <button type="submit" name="suprimer" class="btn btn-danger btn-sm" 
                                  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                        
                        <form action="./imprimer.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id" value="<?php echo $res["id"]; ?>" />
                          <button type="submit" name="imprimer" class="btn btn-outline btn-sm">
                            <i class="fas fa-print"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

<?php include "./footer.php"; ?> 