<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="icon" type="image/png" href="img-layout/logo.png">
	<title>Ajouter un voyage</title>
</head>
<body>
<?php include('header.php')?>

    <section class="ajouterFrom">
    <h2>Ajoutez votre coup de coeur</h2>
    <div id="image">
        <img src="img-layout/boussole.jpg">
        <img src="img-layout/valise.jpg">
        <img src="img-layout/avion.jpg">
        <hr>
    </div>

    <form class="centrage" method="post" action="traitement.php">

        <input type="hidden" name="visible" id="visible" value="0" />

        <label for="titre">Titre Destination :</label> 
        <input type="text" maxlength="255" name="titre" id="titre" class="decalage" placeholder="entrez le titre" />
        <br>	

        <label for="adresse">Localisation :</label> 
        <input type="text" name="adresse" id="adresse" class="decalage" placeholder="ici l'adresse de la destination" />
        <br>
        	
        <label for="resum">Un résumé accrocheur :</label>
        <textarea maxlength="255" cols="125" rows="3" type="text" name="resum" id="resum">ici le résumé</textarea>
        <br>
        
        <label for="description">Une description :</label>
        <textarea cols="125" rows="3" type="text" name="description" id="description">ici la description</textarea>
        <br>
        	
        <label for="photo">La photo à afficher</label>
        <input maxlength="255" size="75" type="text" name="photo1" id="photo">
        <p class="comment">écrire simplement le nom de la photo suivit de l'extension. Exemple : toto.png</p>
        <br>
        
        <div class="question">Le continent sur lequel se trouve la destination :</div>
        <div class="liste">
        <input type="radio" name="section" id="asie" value="asie"><label for="asie">Asie</label><br>
        <input type="radio" name="section" id="europe" value="europe"><label for="europe">Europe</label><br>
        <input type="radio" name="section" id="afrique" value="afrique"><label for="afrique">Afrique</label><br>
        <input type="radio" name="section" id="oceanie" value="oceanie"><label for="oceanie">Oceanie</label><br>
        <input type="radio" name="section" id="amerique" value="amerique"><label for="amerique">Amerique</label>
        </div>
        <br>

        <input id="button" type="submit" value="Valider"/>

    </form>
    </section>

<?php include('footer.php')?>
</body>
</html>