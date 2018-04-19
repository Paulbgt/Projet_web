<?php
try {
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e) {
	die($e->getMessage());
}


// *[English]* Requests used to change the status of an account
// *[Français]* Requêtes utilisées pour changer le statut d'un utilisateur
$account_id = $_POST['account_id'];

$getCurrentStatus = $bdd->prepare('SELECT account.statute FROM account WHERE id=:account_id LIMIT 1');
$getCurrentStatus->execute([':account_id' => $account_id]);

$currentStatus = $getCurrentStatus->fetch();
$currentStatus['statute'] == 1 ? $status = 2 : $status = 1;

$update = $bdd->prepare('UPDATE account SET statute=:status WHERE id=:account_id LIMIT 1');
$update->execute([
    ':account_id' => $account_id,
    ':status' => $status
]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
//header('Location: javascript://history.go(-1)'); 
?>

