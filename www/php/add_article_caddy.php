<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}


$id_account = $_SESSION['id'];

$insert = $db->prepare("INSERT INTO orders(statute, id_account) VALUES('panier', ':id_account')");

$insert->execute([
    ':id_account' => $id_account
]);
?>