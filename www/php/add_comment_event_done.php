<?php
 session_start();
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch(PDOException $e){die($e->getMessage());}
$result = $_POST['comment_event_id'];
$id_account = $_SESSION['id'];
$com = $_POST['comment'];
$request = $bdd->prepare("INSERT INTO commentary (com, id_event, id_account) VALUES(:com, :id_event, :id_account)");
$request->execute([
      'com' => $com,
      'id_event' => $result,
      'id_account' => $id_account
      ]);
header('Location: javascript://history.go(-1)');
?>
