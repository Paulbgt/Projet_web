<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
	<meta charset="utf-8">
</head>
<body>

<h1>Evénement en attente de validation</h1>

<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}

//requête qui permet de récupérer les données dans la BDD
$validate = $bdd->prepare("SELECT * FROM happening WHERE Validate = 0");
$validate->execute();

//afficher chaque entrée une à une
while ($response = $validate->fetch()) 
{
?>

----------------------------------------------------------------------------------------------------------------------------------------------
<p>

<strong>Titre :</strong>

	<?php echo $response['title'];?><br/>

<strong>Description :</strong>

	<?php echo $response['description'];?><br/>

<strong>Date (optionnel)</strong>

	<?php echo $response['event_date'];?><br/>

<strong>Lieu (optionnel)</strong>

	<?php echo $response['place'];?><br/>

<strong>Club (optionnel)</strong>

	<?php echo $response['club'];?><br/>

<strong>Prix (optionnel)</strong>

	<?php echo $response['price'];?><br/>

<strong>Date de publication</strong>

	<?php echo $response['published'];?><br/>

<strong>ID de l'utilisateur</strong>

	<?php echo $response['id_account'];?><br/>

</p>


<a href="delete_event.php?numEvent=<?= $response['id'] ?>"> Supprimer l'événement</a>

<br><br>

<a href="validate.php?numEvent=<?= $response['id'] ?>"> Accepter l'événement</a>






<?php 
}
$validate->closeCursor();

?>


</body>
</html>