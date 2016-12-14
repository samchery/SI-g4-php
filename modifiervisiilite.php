<?php
require_once "connect.php";

// permet de rendre invisible un bloc voyage
// le contraire du formulaire affichervaleur
// assigne la valeur 0 au paramètre visible

$sql = "UPDATE `voyage` SET `visible` = '0' WHERE ID = :ID ;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ID", $_POST['ID']);
$stmt->execute();

// redirige l'utilisateur sur le back office
header("Location: moderation.php?id=".$_POST['ID']);