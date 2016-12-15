<?php
// connection à la BDD
require_once "connect.php";

// récupère les données
$sql = "SELECT `ID`, `moderation`, `titre` FROM `voyage` WHERE `moderation` = 1;";

$stmt = $pdo->prepare($sql);
$stmt->execute();

if((bool)$stmt->rowCount())
    {
        $voyages = $stmt->fetchAll();
    }
    else
    {
        $voyages = null;
    }

if($voyages !== null):
    foreach($voyages as $voyage): ?>
    <a href="modifier.php?id=<?= $row['ID'] ?>">Modérer <?= $voyage['titre'] ?></a>
 
<?php endforeach; 
    else: echo 'Rien à modérer!';
    endif; ?> 