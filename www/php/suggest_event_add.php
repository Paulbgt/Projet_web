<?php session_start();  ?>

<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}
//on définit les variables avec ce que l'utilisateurs a rempli dans le formulaire
$title = $_POST['title'];
$description = $_POST['description'];
$event_date = $_POST['event_date'];

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($title) && !empty($description) && !empty($event_date)) {

//si tous les champs sont remplis alors on inscrit les données dans la BDD 
$add = $bdd->prepare("INSERT INTO happening(title, description, event_date) VALUES(:title, :description, :event_date)");
$add->execute([
    'title' => $title,
    'description' => $description,
    'event_date' => $event_date
]);

//permet de savoir si il y a des erreurs dans notre requête
$add->errorInfo();

//message si l'insertion s'est bien passée
echo "insertion dans la base de données";

}else{

//message si l'insertion dans la base de données ne s'effectue pas
echo "l'événement n'a pas été ajouté dans la base de données.";


}
?>