<?php  
//conexion à la base de données
$db = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');


$add_category = ($_POST['name_category']);

$insert = $db->prepare("INSERT INTO category(name) VALUES(:add_category)");

$insert->execute([
    'add_category' => $add_category
]);

header('Location: ../shop')

?>