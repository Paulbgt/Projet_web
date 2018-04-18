<?php
 session_start();

try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

	die($e->getMessage());

}

$result = $_POST['photo_event_id'];
$msg = "";
$ref = 0;

if(isset($_FILES['image'])) {

  if(!file_exists("../event_picture/".$result)) {
    mkdir("../event_picture/".$result);
  }

  $image = str_replace(" ","",$_FILES['image']['name']);
  $image = str_replace("#","_",$image);

  $path = "../event_picture/".$result."/".basename($image);

  $request = $bdd->prepare("INSERT INTO event_picture (url, ref, id_event) VALUES(:url, :ref, :id_event)");
  $request->execute([
      'url' => $image,
      'ref' => $ref,
      'id_event' => $result
      ]);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      $msg = "Image uploaded successfully";
      echo($msg);
    }else{
      $msg = "Failed to upload image";
      echo($msg);
    }
  }

header('Location: ../eventDone');

?>