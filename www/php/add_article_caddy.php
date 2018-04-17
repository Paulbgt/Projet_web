<?php session_start();  ?>
<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}


$id_account = $_SESSION['id'];

var_dump($id_account);

$insert = $bdd->prepare("INSERT INTO orders(id_account) VALUES(:id_account)");

$insert->execute([
    'id_account' => $id_account
]);

echo "ok";

header('Location: ../market.php')
?>