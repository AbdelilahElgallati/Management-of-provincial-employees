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
    <title>Fiche employé - <?php echo $res["nom"] . ' ' . $res["prenom"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none !important; }
            .print-header { display: block !important; }
        }
        
        @media screen {
            .print-header { display: none; }
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: white;
            color: var(--gray-800);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        .print-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
        }
        
        .print-header {
            text-align: center;
            border-bottom: 2px solid var(--primary-600);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .print-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-600);
            margin: 0;
        }
        
        .print-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
            margin: 10px 0 0 0;
        }
        
        .employee-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .info-section {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-lg);
            padding: 20px;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-600);
            margin-bottom: 15px;
            border-bottom: 1px solid var(--gray-200);
            padding-bottom: 10px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid var(--gray-100);
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 500;
            color: var(--gray-700);
        }
        
        .info-value {
            font-weight: 600;
            color: var(--gray-800);
        }
        
        .info-value.code {
            background: var(--primary-50);
            color: var(--primary-700);
            padding: 2px 8px;
            border-radius: 4px;
            font-family: monospace;
        }
        
        .info-value.badge {
            background: var(--success-50);
            color: var(--success-700);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .print-footer {
            margin-top: 40px;
            text-align: center;
            color: var(--gray-500);
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-200);
            padding-top: 20px;
        }
        
        .no-print {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        .print-btn {
            background: var(--primary-600);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--shadow-md);
        }
        
        .print-btn:hover {
            background: var(--primary-700);
        }
        
        @media (max-width: 768px) {
            .employee-info {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 10px;
            }
        }
    </style>
</head>

<?php 
    include "./tools.php";
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        $res=detail($id)[0];
    }else{
        echo "champs manquant";
    }
?>

<body>
    <div class="no-print">
        <button class="print-btn" onclick="window.print()">
            <i class="fas fa-print"></i>
            Imprimer
        </button>
    </div>
    
    <div class="print-container">
        <div class="print-header">
            <h1 class="print-title">Fiche Employé</h1>
            <p class="print-subtitle">Province Administrative</p>
        </div>
        
        <div class="employee-info">
            <div class="info-section">
                <h2 class="section-title">
                    <i class="fas fa-user"></i> Informations personnelles
                </h2>
                
                <div class="info-row">
                    <span class="info-label">Nom</span>
                    <span class="info-value"><?php echo htmlspecialchars($res["nom"]); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Prénom</span>
                    <span class="info-value"><?php echo htmlspecialchars($res["prenom"]); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">CIN</span>
                    <span class="info-value code"><?php echo htmlspecialchars($res["cin"]); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Date de naissance</span>
                    <span class="info-value"><?php echo date('d/m/Y', strtotime($res["date_nais"])); ?></span>
                </div>
            </div>
            
            <div class="info-section">
                <h2 class="section-title">
                    <i class="fas fa-briefcase"></i> Informations d'emploi
                </h2>
                
                <div class="info-row">
                    <span class="info-label">Date d'affectation</span>
                    <span class="info-value"><?php echo date('d/m/Y', strtotime($res["date_aff"])); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">PPR</span>
                    <span class="info-value"><?php echo $res["ppr"] ? htmlspecialchars($res["ppr"]) : '-'; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Budget</span>
                    <span class="info-value badge"><?php echo htmlspecialchars($res["budget"]); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Grade</span>
                    <span class="info-value"><?php echo htmlspecialchars($res["grade"]); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Échelle</span>
                    <span class="info-value"><?php echo htmlspecialchars($res["echelle"]); ?></span>
                </div>
            </div>
        </div>
        
        <div class="info-section">
            <h2 class="section-title">
                <i class="fas fa-sitemap"></i> Affectation
            </h2>
            
            <div class="info-row">
                <span class="info-label">Division</span>
                <span class="info-value"><?php echo $res["aff_div"] ? htmlspecialchars($res["aff_div"]) : '-'; ?></span>
            </div>
            
            <div class="info-row">
                <span class="info-label">AAL</span>
                <span class="info-value"><?php echo $res["aff_aal"] ? htmlspecialchars($res["aff_aal"]) : '-'; ?></span>
            </div>
        </div>
        
        <div class="print-footer">
            <p>Document généré le <?php echo date('d/m/Y à H:i'); ?></p>
            <p>Système de Gestion des Employés Provinciaux</p>
        </div>
    </div>
    
    <script>
        // Auto-print on load
        window.onload = function() {
            // Small delay to ensure everything is loaded
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
</body>
</html>