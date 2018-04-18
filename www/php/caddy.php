<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Votre panier</title>
</head>
<body>

	<h1>Voici votre panier</h1>


<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}

$idorder = $_SESSION['id_order'];

$see = $bdd->prepare("SELECT * FROM (orders LEFT JOIN order_composite ON orders.id=order_composite.id_orders)LEFT JOIN produce ON produce.id=order_composite.id_produce WHERE orders.id=:idorder AND orders.statute = 'panier'");

$see->execute([
    ':idorder' => $idorder
]);


while ($response = $see->fetch()) {
?>

<form action="add_quantity.php" method="POST">

<span id="idea-infos-title" class="idea-infos-title"><?= $response['name'] ?></span><br>

<span id="idea-infos-title" class="idea-infos-title"><?= $response['price'] ?> euros</span><br>

<p>Veuillez choisir votre quantité : 

<input type="text" name="quantity" id="quantity" value="<?= $response['qantity']?>"></p><br>

<input type="hidden" name="idproduce" id="idproduce" value="<?= $response['id_produce']?>">

<input type="submit" name="add_quantity" value="ajouter votre nouvelle quantité">

<a href="delete_article_caddy.php">Supprimer cet élément de la liste</a>
</form>

<br><br><br><br>

<?php
}
$see->closeCursor();
?>
</body>
</html>