<?php
// Connection base de données
require_once "connect.php";
// PHP 5.*
if(isset($_GET['s'])){
    $visible = $_GET['s'];
} else {
    $visible = 1;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="styles/style.css" rel="stylesheet">
        <title>Nom Site Web</title>
    </head>

    <body>
 
<?php include("header.php");?>

<section class="main-image">
   <h2>Organiser votre <br><strong>voyage sur mesure</strong></h2> </section>
                
<!-- PARTIE PRODUIT -->

<?php 
    // recupère les données
$sql = "SELECT `titre`, `resum`, `photo1` FROM `voyage` WHERE `visible` = :visible ;";
    // Prepare les données
$stmt = $pdo->prepare($sql);
    // associe à la valeur un numéro pour trie par section
$stmt->bindValue(':visible', $visible);
    // execute la requête
$stmt->execute();
?>
        <div class="navigation clearfix"><a href="index.php?s=1"><img class="survol" src="img-content/logo/amerique1.png"> <img class="base" src="img-content/logo/amerique.png"></a><a href="index.php?s=2"><img class="survol" src="img-content/logo/europe1.png"><img class="base" src="img-content/logo/europe.png"></a><a href="index.php?s=3"><img class="survol" src="img-content/logo/asie1.png"><img class="base" src="img-content/logo/asie.png"></a><a href="index.php?s=4"><img class="survol" src="img-content/logo/afrique1.png"><img class="base" src="img-content/logo/afrique.png"></a><a href="index.php?s=5"><img class="survol" src="img-content/logo/oceanie1.png"><img class="base" src="img-content/logo/oceanie.png"></a>
            </div>
            
<section class="produit clearfix">
           
<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?> 

    <article> <img src="img-content/<?=$row['photo1']?>">
     <div class="overlay">
    <h4><?=$row['titre']?></h4>
    <p><small><?=$row['resum']?></small></p> <a class="button2" href="">plus d'info</a> </div>
        </article>
        
        <?php endwhile;?>
       </section>
                     
<?php include("footer.php");?>
    </body>
</html>