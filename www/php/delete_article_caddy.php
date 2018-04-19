<!-- // *[English]* This feature allows us to remove an item from our cart.-->
<!-- // *[Français]* Cette fonction nous permet de supprimer un article de notre panier. -->

<?php session_start();  ?>
<?php 
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch(PDOException $e){die($e->getMessage());}
$idorder = $_SESSION['id_order'];
$idproduce = $_GET['idproduce'];
$a = $bdd->prepare('DELETE FROM order_composite WHERE id_orders=:idorder AND id_produce=:idproduce');
$a->execute([
':idorder' => $idorder,
':idproduce' => $idproduce
]);

header('Location: javascript://history.go(-1)'); 

?>