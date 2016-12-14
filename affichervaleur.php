<?php
require_once "connect.php";

// permet de rendre visible un bloc voyage
// change le paramètre visible pour l'id qui arrive, et on lui donne la valeur 1

$sql = "UPDATE `voyage` SET `visible` = '1' WHERE ID = :ID ;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ID", $_POST['ID'], PDO::PARAM_INT);
$stmt->execute();

// redirige l'utilisateur sur le Back Office
header("Location: moderation.php?id=".$_POST['ID']);