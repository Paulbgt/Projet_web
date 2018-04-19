<!-- // *[English]* this function allows us to confirm our basket to validate our order, it passes our basket to "on hold", then a new basket will be created -->
<!-- // *[Français]* cette fonction permet de confirmer notre panier pour valider notre commande, elle passe notre panier à "en attente", ensuite un nouveau panier sera créer -->

<?php session_start();  ?>
<?php

$db = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

$eza = $db->prepare('UPDATE orders SET statute = "attente" WHERE id_account = :idaccount');

$eza->execute([
	':idaccount' => $_SESSION['id']
]);

$aa = $db->prepare("INSERT INTO orders (statute, id_account) VALUES ('panier',:idaccount)");
$aa->execute(['idaccount' => $_SESSION['id']]);
$_SESSION['id_order'] = $db->lastInsertId();
				

header('Location: ../shop');
?>