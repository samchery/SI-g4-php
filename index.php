<?php
// Connection base de données
require_once "connect.php";

if(isset($_GET['s'])){
    $section = $_GET['s'];
} else {
    $section = "amerique";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">
    <link rel="icon" type="image/png" href="img-layout/logo.png">
    <title>VivaGo</title>
</head>

<body>

<?php include('header.php');?>

<section class="main-image">
    <h2>VivaGo vous transporte <br>vers de nouveaux horizons</h2>
</section>

<!-- PARTIE CONCEPT -->
<h1 id="titre2">Présentation</h1>
<section id="bloc1" class="clearfix">
    <article>
        <p class="testggg"><span id="lettre">P</span>our préparer un voyage, pour rêver et s’évader, pour le plaisir de la découverte, pour rire et s’émerveiller, <strong>VivaGo</strong> est là pour vous guider vers des choix de destinations originales et authentiques. Voici donc notre liste de destinations qui vous permettront de découvrir d’autres voyageurs passionnés et d’aller plus loin dans votre vision du monde. Vous avez également la possibilité de partager votre expérience de votre dernier voyage et d'en faire profiter nos lecteurs, amoureux d'aventures.</p>
    </article>
</section>

<!-- PARTIE PRODUIT -->
<?php
// recupère les données
$sql = "SELECT `ID`, `titre`, `section`, `visible`,  `resum`, `photo1` FROM `voyage` WHERE `section` = :section AND `visible` = 1;";
// Prepare les données
$stmt = $pdo->prepare($sql);
// associe à la valeur un numéro pour trie par section
$stmt->bindValue(':section', $section);
// execute la requête
$stmt->execute();
?>
<!-- la barre de recherche -->
<div>
    <h2 id="World" class="hrecherche">Choisissez une destination ou naviguer par continent</h2>
    <form class="form-wrapper clearfix" method="post" action="">
        <input class="barre" type="text" name="search" placeholder="Que souhaitez-vous rechercher ?">
        <button class="boutonBarre" type="submit" name="submit" value="Rechercher">GO</button>
    </form>
</div>
<div class="navigation clearfix"><a href="index.php?s=amerique#World"><img class="survol" src="img-content/logo/amerique1.png"> <img class="base" src="img-content/logo/amerique.png"></a><a href="index.php?s=europe#World"><img class="survol" src="img-content/logo/europe1.png"><img class="base" src="img-content/logo/europe.png"></a><a href="index.php?s=asie#World"><img class="survol" src="img-content/logo/asie1.png"><img class="base" src="img-content/logo/asie.png"></a><a href="index.php?s=afrique#World"><img class="survol" src="img-content/logo/afrique1.png"><img class="base" src="img-content/logo/afrique.png"></a><a href="index.php?s=oceanie#World"><img class="survol" src="img-content/logo/oceanie1.png"><img class="base" src="img-content/logo/oceanie.png"></a>
</div>

<?php
if(isset($_POST['search'])){
    $stnt = $pdo->prepare("SELECT `ID`, `titre`, `visible`, `section`, `resum`, `photo1` FROM `voyage` WHERE titre LIKE :search AND `visible` = 1;");
    $stnt->bindValue(':search','%'.$_POST['search'].'%');
    $stnt->execute();
    $rows = $stnt->rowCount();
    ?>
    <section class="produit clearfix">
        <?php
        while($row = $stnt->fetch(PDO::FETCH_ASSOC)):?>

            <article>
                <img src="img-content/<?=$row['photo1']?>">
                <div class="overlay">
                    <h4><?=$row['titre']?></h4>
                    <p><small><?=$row['resum']?></small></p> <a class="button2" href="produit.php?ID=<?=$row['ID']?>">Plus d'infos</a> </div>
            </article>
        <?php endwhile;?>
    </section>
<?php }else{
?>

<section class="produit clearfix">
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <article> <img src="img-content/<?=$row['photo1']?>">
            <div class="overlay">
                <h4><?=$row['titre']?></h4>
                <p><small><?=$row['resum']?></small></p> <a class="button2" href="produit.php?ID=<?=$row['ID']?>">Plus d'infos</a> </div>
        </article>
    <?php endwhile;
    }?>
</section>
<!-- PARTIE USER AJOUTE DONNEE -->
<div id="voyage" class="ajout clearfix">
    <img src="img-content/content1.jpg">
    <p>Vous avez voyagé dernièrement ? Partagez avec nous vos expériences et découvertes ! Surprenez-nous !</p>
    <div id="wraper" class="clearfix"><a class="b1" href="formulaire.php">Votre coup de coeur</a>
        <a class="b2" href="formulaire.php"></a></div>
</div>

<?php include('footer.php');?>
</body>
</html>