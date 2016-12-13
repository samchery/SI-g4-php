<?php
require_once "connect.php";
// PHP 7.*
//$visible = $_GET['v'] ?? 1;
// PHP 5.*
if(isset($_GET['v'])){
    $visible = $_GET['v'];
} else {
    $visible = 1;
}

$sql = "SELECT `nom`, `type`, `description`, `img` FROM `pokemon` WHERE `visible` = :visible ;";
//$sql = "SELECT `nom`, `type`, `description` FROM `pokemon` WHERE `visible` = 1 ;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':visible', $visible);
$stmt->execute();
?> <a href="index.php?v=1">Visibles</a> ou <a href="index.php?v=0">Pas visibles</a>
    <table>
        <thead>
            <th>Nom</th>
            <th>Type</th>
            <th>Description</th>
            <th>Image</th>
        </thead>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td>
                    <?=$row['nom']?>
                </td>
                <td>
                    <?=$row['type']?>
                </td>
                <td>
                    <?=$row['description']?>
                </td>
                <td>
                    <?php
            if ($row['img'] !== '') :
            ?> <img src="img/<?=$row['img']?>" alt="" width="50">
                        <?php else:?> <img src="img/Captain_Placeholder.jpg" alt="" width="50">
                            <?php endif;?>
                </td>
            </tr>
            <?php endwhile;?>
    </table>