<?php  
//conexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');


$add_category = ($_POST['name_category']);

$insert = $db->prepare("INSERT INTO category(name) VALUES(:add_category)");

$insert->execute([
    'add_category' => $add_category
]);

header('Location: add_category.php')

?>