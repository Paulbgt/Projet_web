<?php  


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}


$numEvent = $_GET['numEvent'];

//requête permettant de supprimer l'événement
$delete = $bdd->prepare('DELETE FROM happening WHERE id=:num LIMIT 1');
$delete->execute([

':num' => $numEvent

]);


header('Location: validate_event.php');

?>