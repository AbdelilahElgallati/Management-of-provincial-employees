<?php
session_start();
include "./tools.php";

// Handle logout
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_destroy();
    header("location: ./index.php");
    exit();
}

if (!isset($_SESSION["user"]))
  header("location: ./index.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/modern-variables.css">
  <link rel="stylesheet" type="text/css" href="./css/modern-dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title><?php echo isset($page_title) ? $page_title : 'Gestion des Employés'; ?></title>
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
        <a href="./page_principale.php" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'page_principale.php' ? 'active' : ''; ?>">
          <i class="fas fa-tachometer-alt"></i>
          Tableau de bord
        </a>
        <a href="ajoute.php" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'ajoute.php' ? 'active' : ''; ?>">
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
          <h1><?php echo isset($page_title) ? $page_title : 'Gestion des Employés'; ?></h1>
        </div>
        
        <div class="top-nav-actions">
          <?php if (isset($show_search) && $show_search): ?>
          <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Rechercher..." class="search-input" id="searchInput">
          </div>
          <?php endif; ?>
          
          <div class="user-menu">
            <div class="user-avatar">A</div>
            <span>Administrateur</span>
            <i class="fas fa-chevron-down"></i>
          </div>
        </div>
      </header>

      <!-- Page Content Container -->
      <div class="dashboard-content"> 