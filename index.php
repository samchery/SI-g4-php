<?php
// Connection base de données
require_once "connect.php";

$sql = "SELECT `titre`, `resum`, `photo1` FROM `voyage` WHERE `section` = 'asie' ;";
//$sql = "SELECT `nom`, `possesseur` WHERE `visible` = 1 ;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <h1>
                    <?=$row['titre']?>
                </h1> <img src="img-content/<?=$row['photo1']?>">
        <p>
            <?=$row['resum']?>
        </p>
        <?php endwhile;?>