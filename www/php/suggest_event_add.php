<!-- // *[English]* this function allows us to suggest an event in the idea box, we can add: title, description, club, price and image. -->
<!-- // *[Français]* cette fonction nous permet de suggérer un événement dans la boite à idée, nous pouvons ajouter : titre, description, club, prix et image. -->

<?php session_start(); ?>

<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
}
catch(PDOException $e){die($e->getMessage());}
//on définit les variables avec ce que l'utilisateurs a rempli dans le formulaire
$title = $_POST['title'];
$description = $_POST['description'];
$event_date = $_POST['event_date'];
$id_account = $_SESSION['id'];
$place = $_POST['place'];
$club = $_POST['club'];
$price = $_POST['price'];

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($title) && !empty($description)) {

//si tous les champs sont remplis alors on inscrit les données dans la BDD
$add = $bdd->prepare("INSERT INTO event(title, description, event_date, place, club, price, id_account) VALUES(:title, :description, :event_date, :place, :club, :price, :id_account)");
$add->execute([
    'title' => $title,
    'description' => $description,
    'event_date' => $event_date,
    'id_account'=> $id_account,
    'place' => $place,
    'club' => $club,
    'price' => $price
]);

$add->closeCursor();
//permet de savoir si il y a des erreurs dans notre requête
$add->errorInfo();
//var_dump($id_account);
//
////message si l'insertion s'est bien passée
//echo "insertion dans la base de données";
$result = $bdd->lastInsertId();
//    prepare("SELECT id FROM event WHERE title=:title AND description=:description ORDER BY id DESC LIMIT 1");
//$q->execute([
//  'title' => $title,
//  'description' => $description
//]);

//$result = $q->fetch();
if(isset($result)) {

$msg = "";
$ref = 1;

if(isset($_FILES['image'])) {

  if(!file_exists("../event_picture/".$result)) {mkdir("../event_picture/".$result);}
  $image = str_replace(" ","_",$_FILES['image']['name']);
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
}
    header('Location: ../ideaBox');
}
else{
//message si l'insertion dans la base de données ne s'effectue pas
echo "l'événement n'a pas été ajouté dans la base de données.";
}
?>
