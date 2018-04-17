<!DOCTYPE html>
<html>
<head>
	<title>Le magasin</title>
</head>
<body>

	<h1>Notre magasin</h1>

<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}
//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT * FROM produce");
$display->execute();
//afficher chaque entrée une à une
while ($response = $display->fetch()) {
?>
	
	<form action="add_article_caddy.php" method="POST">
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <span id="idea-infos-title1" class="idea-infos-title"><?= $response['name'] ?></span><br>

            <span id="idea-infos-place1" class="idea-infos-place"><?= $response['description'] ?></span><br>

            <span id="idea-infos-club1" class="idea-infos-club"><?= $response['price'] ?></span><br>

            <input type="submit" name="add_caddy" value="Ajouter au panier"><br>

            </form>

------------------------------------------------------------------------------------------------


        </div>
    </div>

<?php 
}
$display->closeCursor();

?>

            <br><br><br><br>


<form action="caddy.php" method="POST">
<input type="submit" name="see_panier" value="Voir votre panier">
</form>

</body>
</html>