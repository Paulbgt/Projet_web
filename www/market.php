<?php session_start();  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="icon" type="image/png" href="site_picture/exia-logo.png"/>
	<title>BDE Connexion</title>
    <meta name="description" content="Site web du BDE de l'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="AKLibrary/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/index.min.css">
</head>
<body>

<?php include '_header.php' ?>

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
	
	<form action="php/add_article_caddy.php" method="POST">
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <span id="shop-info-name" name="shop-info-name" class="shop-info-name"><?= $response['name'] ?></span><br>

            <span id="shop-info-description" name="shop-info-description" class="shop-info-description"><?= $response['description'] ?></span><br>

            <span id="shop-info-price" name="shop-info-price" class="shop-info-price"><?= $response['price'] ?></span><br>

            <input type="hidden" name="take_id_produce" id="take_id_produce" value="<?= $response['id_category']?>"> 

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


<form action="php/caddy.php" method="POST">
<input type="submit" name="see_panier" value="Voir votre panier">
</form>

 <?php echo("id panier".$_SESSION['id_order']."GGGG");?>

</body>
</html>

<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
