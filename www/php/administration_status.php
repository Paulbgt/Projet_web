<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch(PDOException $e){die($e->getMessage());}
$update = $bdd->prepare('UPDATE account SET statute=:status WHERE id=:account_id LIMIT 1');
$update->execute([
    ':account_id' => $_POST['account_id'],
    ':status' => $_POST['status']
]);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
