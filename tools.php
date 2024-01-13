<?php

if (isset($_POST["requestType"])) {
  if ($_POST["requestType"] == "getspecific") {
    $specific = json_decode($_POST["requestData"]);
    echo json_encode(getdata_filtrer($specific->type, $specific->val));
  }
}

function getdata()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM employe");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getdata_filtrer($type, $val)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM employe WHERE $type like '%$val%';");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getUsers()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT email,mot_passe FROM login");
    $req->execute();
    $res = $req->fetchAll();
    $data = array();
    foreach ($res as $r) {
      $data[$r[0]] = ["mot_passe" => $r[1]];
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $data;
}

function ajouter($nom, $prenom, $cin, $date_nais, $date_aff, $budget, $ppr, $grade, $echelle, $division, $aal)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare('INSERT INTO employe(nom,prenom,cin,date_nais,date_aff,budget,ppr,grade,echelle,
                aff_div,aff_aal) values (:nom,:prenom,:cin,:date_nais,:date_aff,:budget,:ppr,:grade,:echelle,:division,:aal);');
    if ($division === " ") {
      $division = null;
    }
    if ($aal === " ") {
      $aal = null;
    }
    $req->execute([
      "nom" => $nom, "prenom" => $prenom, "cin" => $cin, 'date_nais' => $date_nais, "date_aff" => $date_aff,
      "budget" => $budget, "ppr" => $ppr, "grade" => $grade, "echelle" => $echelle, "division" => $division, "aal" => $aal
    ]);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function detail($id)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM employe where id=:id");
    $req->execute(["id" => $id]);
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getbudget()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM budget");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getgrade()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM grade");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getechelle()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM echelle");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getdivision()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM division");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function getaal()
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    $req = $con->prepare("SELECT * FROM aal");
    $req->execute();
    $res = $req->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $res;
}

function modifier($id, $nom, $prenom, $cin, $date_nais, $date_aff, $budget, $ppr, $grade, $echelle, $aff_div, $aff_aal)
{
  try {
    $con = new PDO('mysql:host=localhost;dbname=les_employes', 'root', '');
    if ($aff_div === "null") {
      $aff_div = null;
    }
    if ($aff_aal === "null") {
      $aff_aal = null;
    }
    $req = $con->prepare(' UPDATE employe SET nom = :nom , prenom = :prenom , cin = :cin , 
                date_nais = :date_nais , date_aff = :date_aff , budget = :budget , ppr = :ppr , grade = :grade ,
                echelle = :echelle , aff_div = :aff_div , aff_aal = :aff_aal WHERE id = :id ;');
    $req->execute([
      "id" => $id, "nom" => $nom, "prenom" => $prenom, "cin" => $cin,
      "date_nais" => $date_nais, "date_aff" => $date_aff, "budget" => $budget, "ppr" => $ppr,
      "grade" => $grade, "echelle" => $echelle, "aff_div" => $aff_div, "aff_aal" => $aff_aal
    ]);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
