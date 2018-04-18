<?php session_start();  ?>
<?php 

try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}

$idorder = $_SESSION['id_order'];
$idaccount = $_SESSION['id'];

$a = $bdd->prepare('DELETE FROM order_composite where id_orders=:idorder LIMIT 1');
$a->execute([
':idorder' => $idorder
]);

header('Location: caddy.php');

?>






