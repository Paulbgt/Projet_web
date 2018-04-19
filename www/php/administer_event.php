<!-- // *[English]* This function allows us to administer an event if we modify it. -->
<!-- // *[Français]* Cette fonction nous permet d'administrer un event si on venait à le modifier.-->

<?php


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){die($e->getMessage());}
$mid = $_POST['mid'];
$mtitle = $_POST['mtitle'];
$mdescription = $_POST['mdescription'];
$mdate = $_POST['mdate'];
$mplace = $_POST['mplace'];
$mclub = $_POST['mclub'];
$mprice = $_POST['mprice'];
$meventStatus = $_POST['meventStatus'];
$v = $bdd->prepare('UPDATE event SET title=:mtitle, description=:mdescription, event_date=:mdate, place=:mplace, club=:mclub, price=:mprice, eventStatus=:meventStatus WHERE id=:mid LIMIT 1');
$v->execute([
':mid' => $mid,
':mtitle' => $mtitle,
':mdescription' => $mdescription,
':mdate' => $mdate,
':mplace' => $mplace,
':mclub' => $mclub,
':mprice' => $mprice,
':meventStatus' => $meventStatus
			]);

if($_FILES['image']['name'] != '') {
	$msg = "";
	$ref = 1;
  if(!file_exists("../event_picture/".$mid)) {
    mkdir("../event_picture/".$mid);
  }
    if (isset($_FILES['image'])) {
  $image = str_replace(" ","_",$_FILES['image']['name']);
  $image = str_replace("#","_",$image);
  $path = "../event_picture/".$mid."/".basename($image);
  $request = $bdd->prepare("UPDATE event_picture SET url = :url WHERE id_event = :id_event AND ref = :ref LIMIT 1");
  $request->execute([
      'url' => $image,
      'id_event' => $mid,
      'ref' => $ref
      ]);
  if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      $msg = "Image uploaded successfully";
      echo($msg);
    }else{
      $msg = "Failed to upload image";
      echo($msg);
    }
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
