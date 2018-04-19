<!-- // *[English]* This feature allows you to add an item to the user's cart-->

<!-- //*[Français]* Cette fonction permet d'ajouter un article dans le panier de l'utilisateur-->

<?php session_start();  ?>
<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch(PDOException $e){die($e->getMessage());}
$idorder = $_SESSION['id_order'];
$idproduce = $_POST['take_id_produce'];
$insert = $bdd->prepare("INSERT INTO order_composite(id_orders, id_produce) VALUES(:idorder, :idproduce)");
$insert->execute([
    ':idorder' => $idorder,
    ':idproduce' => $idproduce
]);
header('Location: ../shop.php')
?>
