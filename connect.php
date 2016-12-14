<?php
try{
    $pdo = new PDO('mysql:dbname=test;host=localhost','root','root');
} catch(PDOException $exception) {
    die($exception->getMessage());
}

// récupère un bon encodage 
$pdo->exec("SET NAMES UTF8");
