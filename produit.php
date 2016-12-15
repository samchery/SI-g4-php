<?php
// Connection base de données
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">
    <link rel="icon" type="image/png" href="img-layout/logo.png">
	<title>Produit-Destination</title>
</head>

<body>
    <?php include('header.php');?>

    <section id="produit" class="clearfix">
        <?php 
            // récupère l'ID du bloc voyage, si existe pas, on redirige vers l'index
        if(isset($_GET['ID'])){
            $ID = (int) $_GET['ID'];
        } else {
            header('Location: index.php');
        }
            // recupère les données
         $sql = "SELECT `ID`, `titre`, `description`, `adresse`, `photo1` FROM `voyage` WHERE ID = :ID ;";
            // Prepare les données
         $stmt = $pdo->prepare($sql);
         $stmt->bindValue(":ID", $ID, PDO::PARAM_INT);   
            // execute la requête
         $stmt->execute();

         $row = $stmt->fetch(PDO::FETCH_ASSOC); 
         ?>   

        <h1><?=$row['titre']?></h1>
        <h2><?=$row['adresse']?></h2>
        <figure>
            <img src="img-content/<?=$row['photo1']?>">
        </figure>
        <p><?=$row['description']?></p>
    </section>

   <?php include('footer.php');?>
</body>
</html>