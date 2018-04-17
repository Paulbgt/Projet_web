<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

    die($e->getMessage());
}


$id_account = $_SESSION['id'];

$insert = $db->prepare("INSERT INTO orders(statute, id_account) VALUES('panier', ':id_account')");

$insert->execute([
    ':id_account' => $id_account
]);
?>