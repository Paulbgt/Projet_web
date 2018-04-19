<?php session_start();  ?>
<?php

$db = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

$eza = $db->prepare('UPDATE orders SET statute = "attente" WHERE id_account = :idaccount');

$eza->execute([
	':idaccount' => $_SESSION['id']
]);

//header('Location: ../shop');
?>