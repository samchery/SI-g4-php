<?php
require_once "connect.php";

// formulaire permettant de modifier un bloc voyage déjà existant
// récupère les données pour le voyage sélectionné (ID)
// prépare la valeur de l'ID on l'affecte avec la valeur récupérer dans le POST.

$sql = "SELECT `ID`, `titre`, `adresse`, `description`, `resum`, `photo1`, `section` FROM `voyage` WHERE ID = :ID";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ID", $_GET['ID']);
$stmt->execute();
if (false == $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    header("Location: backoffice.php");
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">
    <link rel="icon" type="image/png" href="img-layout/logo.png">
    <title>Modifier <?=$row['titre']?></title>
</head>
<body>
<h1 id="titlemodif">Éditer un article</h1>
<form action="requete/update.php" method="post" class="editer">

    <input type="hidden" name="ID" value="<?=$row['ID']?>">

    <p>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?=$row['titre']?>">
    </p>
    <p>
        <label for="adresse">Localisation :</label>
        <input type="text" name="adresse" id="adresse" class="decalage" value="<?=$row['adresse']?>" />
    </p>

    <p><label for="resum">Résumé accrocheur :</label>
        <textarea cols="125" rows="3" type="text" name="resum" id="resum" value="<?=$row['resum']?>"><?=$row['resum']?></textarea>
    </p>

    <p>
        <label for="description">Description :</label>
        <textarea cols="125" rows="3" type="text" name="description" id="description" value="<?=$row['description']?>"><?=$row['description']?></textarea>
    </p>

    <p>
        <label for="photo">Photo :</label>
        <input type="text" name="photo1" id="photo" value="<?=$row['photo1']?>">
    </p>

    <p>
        <label for="section">Continent :</label>
        <input type="text" name="section" id="section" value="<?=$row['section']?>">
    </p>

    <input type="submit" value="Modifier" id="modif">
</form>

</body>
</html>