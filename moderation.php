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

<h2 class="BkO">Ajouter une nouvelle donnée :</h2>

    <form class="addvalue" action="ajout.php" method="post">
    
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


<h2 class="BkO">Filtrer les données :</h2>
    <div class="grosPatapouf">
    <div class="continent">
    <form method="post" action="moderation.php">
            <p>
                Cochez les filtres à activer :<br />
                <input type="checkbox" name="bo[]" id="afrique" value="afrique" /> <label for="afrique">Afrique</label><br />
                <input type="checkbox" name="bo[]" id="europe" value="europe" /> <label for="europe">Europe</label><br />
                <input type="checkbox" name="bo[]" id="amerique" value="amerique" /> <label for="amerique">Amerique</label><br />
                <input type="checkbox" name="bo[]" id="asie" value="asie" /> <label for="asie">Asie</label><br />
                <input type="checkbox" name="bo[]" id="oceanie" value="oceanie" /> <label for="oceanie">Oceanie</label><br />
                <input type="submit" value="VALIDER">

            </p>

    </form>
    </div>
    <div class="visible">
    <form method="post" action="moderation.php">
        <p>
            Cochez les filtres à activer :<br />
            <input type="checkbox" name="vi[]" id="visible" value="1" /> <label for="visible">Visible</label><br />
            <input type="checkbox" name="vi[]" id="nonvisible" value="0" /> <label for="oceanie">Non Visible</label><br />
            <input type="submit" value="VALIDER">

        </p>

    </form>
    </div>
    </div>
    <table>
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
<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>



 <?PHP
    if(isset( $_POST['bo']) && !empty( $_POST['bo'])) {
        $DATA_BO = $_POST['bo'];
        foreach($DATA_BO as $DATA_BO)
        {
            if($row['section'] == $DATA_BO)
            {
            ?>


            <tr>
                <td><?= $row['ID'] ?></td>
                <td><?= $row['titre'] ?></td>
                <td class="resum"><?= $row['resum'] ?></td>
                <td><?= $row['photo1'] ?><br><img src="img-content/<?= $row['photo1'] ?>"></td>
                <td><?= $row['section'] ?></td>

                <!-- ici la case pour visibilité -->
                <td>
                    <!-- ajout PHP et form pour afficher/cacher -->
                    <?php $test = $row['visible'];
                    if ($test == true) {
                        ?>
                        <p> visible </p>
                        <form action="modifiervisiilite.php" method="post">
                            <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                            <input type="submit" value="cacher">
                        </form>
                        <?php
                    } else {
                        ?>
                        <p> invisible </p>
                        <form action="affichervaleur.php" method="post">
                            <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                            <input type="submit" value="afficher">
                        </form>
                        <?php
                    }
                    ?>
                </td>

                <!-- ici la case pour moderation -->
                <td class="moderation">
                    <div><span class="relief">Attention !</span> La suppression d'une donnée est irréversible.</div>

                    <!-- form pour suppression d'une valeur -->
                    <form action="supprimer.php" method="post">
                        <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                        <input class="supp" type="submit" value="supprimer">
                    </form>

                    <!-- form pour modification d'une valeur -->
                    <form action="requete/modifier.php" method="post">
                        <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                        <input class="edit" type="submit" value="éditer">
                    </form>
                </td>

            </tr>

            <?PHP
        }
    }
}

    elseif (isset( $_POST['vi']) && !empty( $_POST['vi'])) {
        $DATA_VI = $_POST['vi'];
        foreach($DATA_VI as $DATA_VI)
        {
            if($row['visible'] == $DATA_VI)
            {
                ?>


                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['titre'] ?></td>
                    <td class="resum"><?= $row['resum'] ?></td>
                    <td><?= $row['photo1'] ?><br><img src="img-content/<?= $row['photo1'] ?>"></td>
                    <td><?= $row['section'] ?></td>

                    <!-- ici la case pour visibilité -->
                    <td>
                        <!-- ajout PHP et form pour afficher/cacher -->
                        <?php $test = $row['visible'];
                        if ($test == true) {
                            ?>
                            <p> visible </p>
                            <form action="modifiervisiilite.php" method="post">
                                <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                                <input type="submit" value="cacher">
                            </form>
                            <?php
                        } else {
                            ?>
                            <p> invisible </p>
                            <form action="affichervaleur.php" method="post">
                                <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                                <input type="submit" value="afficher">
                            </form>
                            <?php
                        }
                        ?>
                    </td>

                    <!-- ici la case pour moderation -->
                    <td class="moderation">
                        <div><span class="relief">Attention !</span> La suppression d'une donnée est irréversible.</div>

                        <!-- form pour suppression d'une valeur -->
                        <form action="supprimer.php" method="post">
                            <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                            <input class="supp" type="submit" value="supprimer">
                        </form>

                        <!-- form pour modification d'une valeur -->
                        <form action="modifier.php" method="post">
                            <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                            <input class="edit" type="submit" value="éditer">
                        </form>
                    </td>

                </tr>

                <?PHP
            }
        }
    }

else
{
    ?>
    <tr>
        <td><?= $row['ID'] ?></td>
        <td><?= $row['titre'] ?></td>
        <td class="resum"><?= $row['resum'] ?></td>
        <td><?= $row['photo1'] ?><br><img src="img-content/<?= $row['photo1'] ?>"></td>
        <td><?= $row['section'] ?></td>

        <!-- ici la case pour visibilité -->
        <td>
            <!-- ajout PHP et form pour afficher/cacher -->
            <?php $test = $row['visible'];
            if ($test == true) {
                ?>
                <p> visible </p>
                <form action="modifiervisiilite.php" method="post">
                    <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                    <input type="submit" value="cacher">
                </form>
                <?php
            } else {
                ?>
                <p> invisible </p>
                <form action="affichervaleur.php" method="post">
                    <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                    <input type="submit" value="afficher">
                </form>
                <?php
            }
            ?>
        </td>

        <!-- ici la case pour moderation -->
        <td class="moderation">
            <div><span class="relief">Attention !</span> La suppression d'une donnée est irréversible.</div>

            <!-- form pour suppression d'une valeur -->
            <form action="supprimer.php" method="post">
                <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                <input class="supp" type="submit" value="supprimer">
            </form>

            <!-- form pour modification d'une valeur -->
            <form action="modifier.php" method="post">
                <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                <input class="edit" type="submit" value="éditer">
            </form>
        </td>

    </tr>
    <?PHP
}?>
    <?php endwhile;?>
</table>
</body>
