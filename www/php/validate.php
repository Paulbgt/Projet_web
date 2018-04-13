<?php  

try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}


$num = $_GET['numEvent'];


$valid = $bdd->prepare("SELECT * FROM happening WHERE id = :num");



$valid->execute([
':num' => $num
]);


$response = $valid->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Accept</title>
</head>
<body>
<h1>Avez vous des modifications avant d'accepter l'événement ?</h1>

<form action="validate_event_bdd.php" method="POST">

<p>
	<input type="hidden" name="numEvent" id="numEvent" value="<?= $response['id']; ?>">
</p>

<p>
	<label for="mtitle">Titre : </label>
	<input type="text" name="mtitle" id="mtitle" value="<?= $response['title']; ?>">
</p>

<p>
	<textarea name="mdescription" ><?= $response['description']; ?></textarea>
	
</p>

<p>
	<label for="mdate">Date : </label>
	<input type="text" name="mdate" id="mdate" value="<?= $response['event_date']; ?>">
</p>

<p>
	<label for="mplace">Lieu : </label>
	<input type="text" name="mplace" id="mplace" value="<?= $response['place']; ?>">
</p>

<p>
	<label for="mclub">Club : </label>
	<input type="text" name="mclub" id="mclub" value="<?= $response['club']; ?>">
</p>

<p>
	<label for="mprice">Prix : </label>
	<input type="text" name="mprice" id="mprice" value="<?= $response['price']; ?>">
</p>

<p>
	<input type="submit" name="Validate" value="Valider">
</p>

</form>
</body>
</html>