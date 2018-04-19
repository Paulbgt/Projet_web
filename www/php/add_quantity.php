<?php session_start();  ?>
<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch(PDOException $e){die($e->getMessage());}
$idorder = $_SESSION['id_order'];
$qantity = $_POST['quantity'];
$idproduce = $_POST['idproduce'];
$b = $bdd->prepare('UPDATE order_composite SET qantity = :qantity WHERE id_orders=:idorder AND id_produce=:idproduce');
$b->execute([
	':qantity' => $qantity,
    ':idorder' => $idorder,
    ':idproduce' => $idproduce
]);
header('Location: caddy.php');
?>
