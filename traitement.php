<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="icon" type="image/png" href="img-layout/logo.png">
	<title>Ajouter un voyage Validation</title>
</head>
<body>
<?php include('header.php')?>
   
    <section class="Thanks">
		<h2>Merci ! </h2>
        <p>Votre message à bien été pris en compte, il s'affichera une fois qu'un modérateur aura accepté votre ajout !</p>
    </section>
 
               
<?php
    // recupère les données et on les traites
 $sql = "INSERT INTO `voyage` (`titre`, `adresse`, `description`, `resum`, `photo1`, `section`, `visible`) VALUES (:titre, :adresse, :description, :resum, :photo, :section, :visible) ";
    
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":titre", $_POST ['titre'], PDO::PARAM_STR);
$stmt->bindValue(":adresse", $_POST ['adresse'], PDO::PARAM_STR);
$stmt->bindValue(":description", $_POST ['description'], PDO::PARAM_STR);
$stmt->bindValue(":resum", $_POST ['resum'], PDO::PARAM_STR);
$stmt->bindValue(":photo", $_POST ['photo1'], PDO::PARAM_STR);
$stmt->bindValue(":visible", $_POST ['visible'], PDO::PARAM_INT);
$stmt->bindValue(":section", $_POST ['section']);
$stmt->execute();
?>

<?php include('footer.php')?>
</body>
</html>
