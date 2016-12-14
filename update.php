<?php
require_once "connect.php";

// permet de modifier un bloc voyage
$sql = "UPDATE `voyage` SET
`ID` = :ID,
`titre` = :titre,
`adresse` = :adresse,
`description` = :description,
`resum` = :resum,
`photo1` = :photo,
`section` = :section
WHERE ID = :ID ;";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ID", $_POST['ID']);
$stmt->bindValue(":titre", $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue(":adresse", $_POST['adresse'], PDO::PARAM_STR);
$stmt->bindValue(":description", $_POST['description'], PDO::PARAM_STR);
$stmt->bindValue(":resum", $_POST['resum'], PDO::PARAM_STR);
$stmt->bindValue(":photo", $_POST['photo1'], PDO::PARAM_STR);
$stmt->bindValue(":visible", $_POST['visible'], PDO::PARAM_INT);
$stmt->bindValue(":section", $_POST['section'], PDO::PARAM_STR);

$stmt->execute();

// redirige vers le back office
header("Location: moderation.php?id=".$_POST['ID']);