<?php
try{
    $pdo = new PDO('mysql:dbname=g4si;host=localhost','root','root');
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec("SET NAMES UTF8");