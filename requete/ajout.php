<?php
require_once "../connect.php";

// permet d ajouter un bloc voyage
// récupère les données et prépare des variables vides
// attributions des variables avec ce qu'on répère du formulaire

$sql = "INSERT INTO `voyage`(`titre`, `adresse`, `description`, `resum`, `photo1`, `section`, `visible`) VALUES (:titre, :adresse, :description, :resum, :photo, :section, :visible) ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":titre", $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue(":adresse", $_POST['adresse'], PDO::PARAM_STR);
$stmt->bindValue(":description", $_POST['description'], PDO::PARAM_STR);
$stmt->bindValue(":resum", $_POST['resum'], PDO::PARAM_STR);
$stmt->bindValue(":photo", $_POST['photo1'], PDO::PARAM_STR);
$stmt->bindValue(":visible", $_POST['visible'], PDO::PARAM_INT);
$stmt->bindValue(":section", $_POST['section'], PDO::PARAM_STR);
$stmt->execute();

$insertId =$pdo->lastInsertId();

// redirige l'utilisateur sur le Back Office
echo "<script type='text/javascript'>";
echo "alert('élément bien ajouté');";
echo "window.location.href='../moderation.php#$insertId'";
echo "</script>";
