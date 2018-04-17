<!DOCTYPE html>
<html>
<head>
	<title>ajouter un article</title>
</head>
<body>

	<h1>Ajouter un nouvel article</h1>

<form action="add_article_bdd.php" method="POST"><br><br>
	
<input type="text" name="name_article" id="name_article" placeholder="nom de l'article"><br><br>

<input type="text" name="description_article" id="description_article" placeholder="description de l'article"><br><br>

<input type="text" name="price_article" id="price_article" placeholder="prix de l'article"><br><br>

<p>Choisissez une catégorie :</p>

<select name="category_article" id="category_article">
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');
 
    }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 
$reponse = $bdd->query( 'SELECT id, name FROM category' ) or die(print_r($bdd->errorInfo()));;
 
while ($donnees = $reponse->fetch())
{
    echo '<option value="' . $donnees['id'] . '">' . $donnees['name'] . '</option>';
}
 
$reponse->closeCursor();


 ?>

 

 </select>

<br><br>

<input type="submit" name="add">
</form>
</body>
</html>