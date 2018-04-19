<!-- // *[English]* This function allows you to add a new category of article in the database.-->

<!-- //*[Français]* Cette fonction permet de rajouter une nouvelle catégorie d'article dans la base de données. -->

<?php
//conexion à la base de données
$db = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
$add_category = ($_POST['name_category']);
$insert = $db->prepare("INSERT INTO category(name) VALUES(:add_category)");
$insert->execute(['add_category' => $add_category]);
header('Location: ../shop')
?>
