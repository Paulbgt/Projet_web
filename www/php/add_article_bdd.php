<?php 
try
{
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
 
    }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$name_article = $_POST['name_article'];
$description_article = $_POST['description_article'];
$price_article = $_POST['price_article'];
$category_article = $_POST['category_article'];


$insert = $bdd->prepare("INSERT INTO produce(name, description, price, id_category) VALUES(:name_article, :description_article, :price_article, :id_category)");

$insert->execute([
    ':name_article' => $name_article,
    ':description_article' => $description_article,
    ':price_article' => $price_article,
    ':id_category' => $category_article
]);

$insert->closeCursor();

header('Location: ../shop');
?>