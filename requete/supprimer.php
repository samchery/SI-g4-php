<?php
require_once "../connect.php";

// permet de supprimer un bloc voyage

$sql = "DELETE FROM `voyage` WHERE ID = :ID LIMIT 1 ;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ID", $_GET['ID']);
$stmt->execute();

// affiche un message à l'utilisateur pour lui signaler que l'élément est bien supprimé
// redirection sur le back office
echo "<script type='text/javascript'>";
echo "alert('Élément correctement supprimé !');";
echo "window.location.href='../moderation.php';";
echo "</script>";

