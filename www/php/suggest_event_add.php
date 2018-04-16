<?php session_start(); ?>

<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}

$msg = "";

if(isset($_FILES['image'])) {

	$path = "../event_picture/"..basename($_FILES['image']['name']);

	$image = $_FILES['image']['name'];

	$request = $bdd->prepare("INSERT INTO event_picture (url) VALUES(:url)");
	$request->execute(['url' => $image]);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
  		$msg = "Image uploaded successfully";
  		echo($msg);
  	}else{
  		$msg = "Failed to upload image";
  		echo($msg);
  	}

}

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
    

    // header('Location: ../ideaBox'); -------------------------------------------------------

}else{

//message si l'insertion dans la base de données ne s'effectue pas
echo "l'événement n'a pas été ajouté dans la base de données.";


}
?>