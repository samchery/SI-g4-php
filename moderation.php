<?php
// connection à la BDD
require_once "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/style.css" rel="stylesheet">
    <title>Back Office Vivago</title>
</head>

<body>
<!-- CODE PHP pour récupérer les données pour la notitification d'admin -->
<?php
$req = $pdo->prepare('SELECT titre, ID FROM voyage WHERE visible = 0');
$req->execute();
if((bool)$req->rowCount())
{
    $voyages = $req->fetchAll();
}
else
{
    $voyages = null;
}

$req->closeCursor();
?>



<div class="entete">
    <img class="logo" src="img-content/logo.png" />
    <h1><span class="relief">VIVA</span>GO, le back-office</h1>
    <a href="index.php">Retourner sur le site</a>
</div>

<?php
// Récupérer la BDD
$sql = "SELECT `ID`, `titre`, `resum`, `photo1`, `section`, `visible` FROM `voyage` WHERE `section`=section; OR `visible`=visible;";
// Prepare les données

$stmt = $pdo->prepare($sql);
// execute la requête
$stmt->execute();
?>

<!-- FORMULAIRE POUR AJOUTER UNE DONNEE A PARTIR DU Bck O -->
<h2 class="BkO">Ajouter une nouvelle donnée :</h2>

<form class="addvalue" action="requete/ajout.php" method="post">

    <div class="question">Rendre visible l'ajout :</div>
    <div class="liste">
        <input type="radio" name="visible" id="choix" value="1"><label for="choix">visible</label><br>
        <input type="radio" name="visible" id="choix" value="0"><label for="choix">caché</label>
    </div>


    <label class="question" for="titre">Titre de la destination :</label>
    <input type="text" maxlength="255" name="titre" id="titre">

    <label class="question" for="adresse">Localisation :</label>
    <input type="text" name="adresse" id="adresse" class="decalage" placeholder="ici l'adresse de la destination" />

    <label class="question" for="resum">Un résumé accrocheur :</label>
    <textarea maxlength="255" cols="125" rows="3" type="text" name="resum" id="resum">ici le résumé</textarea>

    <label class="question" for="description">Une description :</label>
    <textarea cols="125" rows="3" type="text" name="description" id="description">ici la description</textarea>

    <label class="question" for="photo">La photo à afficher</label>
    <input maxlength="255" size="75" type="text" name="photo1" id="photo">
    <p class="comment">écrire simplement le nom de la photo suivit de l'extension. Exemple : toto.png</p>

    <div class="question">Le continent sur lequel se trouve la destination :</div>
    <div class="liste">
        <input type="radio" name="section" id="asie" value="asie"><label for="asie">Asie</label><br>
        <input type="radio" name="section" id="europe" value="europe"><label for="europe">Europe</label><br>
        <input type="radio" name="section" id="afrique" value="afrique"><label for="afrique">Afrique</label><br>
        <input type="radio" name="section" id="oceanie" value="oceanie"><label for="oceanie">Oceanie</label><br>
        <input type="radio" name="section" id="amerique" value="amerique"><label for="amerique">Amerique</label>
    </div>

    <input class="button" type="submit" value="Ajouter">
</form>

<!-- Partie pour filtre -->
<h2 class="BkO">Filtrer les données :</h2>
<div class="grosPatapouf">
    <div class="continent">
        <form method="post" action="moderation.php#tableDonnees">
            <h3 class="titreback">Cochez les filtres à activer :</h3>
            <p>
                <input type="checkbox" name="bo[]" id="afrique" value="afrique" /> <label for="afrique">Afrique</label><br />
                <input type="checkbox" name="bo[]" id="europe" value="europe" /> <label for="europe">Europe</label><br />
                <input type="checkbox" name="bo[]" id="amerique" value="amerique" /> <label for="amerique">Amerique</label><br />
                <input type="checkbox" name="bo[]" id="asie" value="asie" /> <label for="asie">Asie</label><br />
                <input type="checkbox" name="bo[]" id="oceanie" value="oceanie" /> <label for="oceanie">Oceanie</label><br />
                <input class="btn" type="submit" value="VALIDER" />
            </p>
        </form>
    </div>
    <div class="visible">
        <form method="post" action="moderation.php#tableDonnees">
            <h3 class="titreback">Cochez les filtres à activer :</h3>
            <p>
                <input type="checkbox" name="vi[]" id="visible" value="1" /> <label for="visible">Visible</label><br />
                <input type="checkbox" name="vi[]" id="nonvisible" value="0" /> <label for="oceanie">Non Visible</label><br />
                <input class="btn" type="submit" value="VALIDER">

            </p>

        </form>
    </div>
</div>

<!-- Partie informations sur les données à modérer -->
<h2 class="BkO">Les données à modérer :</h2>
<?php if($voyages !== null):?>
    <section class="notification">
        <?php
        foreach($voyages as $voyage): ?>

            <a href="moderation.php#<?= $voyage['ID'] ?>">
                <span>Modérer</span> <?= $voyage['titre'] ?></a>

        <?php endforeach;?>
    </section>
<?php         else: ?>
    <section class="notification">Rien à modérer!</section>
    <?php ;
endif; ?>

<!-- Tableau des données -->
<table id="tableDonnees">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Résumé</th>
        <th>Photo</th>
        <th>Continent</th>
        <th>Visible</th>
        <th>Modération</th>
    </tr>

    <!-- AFFICHE LA BDD DANS UN TABLEAU / boucle -->
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):

// CODE PHP POUR FAIRE LE FILTRE
// 3 cas :
// 1) SI un filtre CONTINENT a été activé
// 2) SI un filtre VISIBLE/INVISIBLE a été activé
// 3) ELSE

        if(isset( $_POST['bo']) AND !empty( $_POST['bo'])) {
            // 1) SI un filtre CONTINENT a été activé, affiche le tableau après
            $DATA_BO = $_POST['bo'];
            foreach($DATA_BO as $DATA_BO)
            {
                if($row['section'] == $DATA_BO)
                {

                    // portion du tableau dans une autre page pour simplifier code
                    include('tableau-donnee.php');
                }
            }
        }

        elseif (isset( $_POST['vi']) AND !empty( $_POST['vi'])) {
            // 2) SI un filtre (IN)VISIBLE a été activé
            $DATA_VI = $_POST['vi'];
            foreach($DATA_VI as $DATA_VI)
            {
                if($row['visible'] == $DATA_VI)
                {

                    // portion du tableau dans une autre page pour simplifier code
                    include('tableau-donnee.php');

                }
            }
        }

        else{
            // 3) ELSE

            // portion du tableau dans une autre page pour simplifier code
            include('tableau-donnee.php');

        }
    endwhile;?>
</table>
</body>
