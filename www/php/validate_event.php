<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}

$validate = $bdd->prepare("SELECT * FROM happening");
$validate->execute();
$responses = $validate->fetchall();
var_dump($responses);




?>



<!DOCTYPE html>
<html>
<head>
	<title>Traitement</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Les événement en cours de validation</h1>







</body>
</html>