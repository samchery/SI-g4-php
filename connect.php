<?php
try{
    $pdo = new PDO('mysql:dbname=demo-pdo;host=localhost','root','root');
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec("SET NAMES UTF8");
