<?php  


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}


$event_id = $_POST['event_id'];

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($event_id)) {
    //requête permettant de supprimer l'événement
    $delete = $bdd->prepare('DELETE FROM event WHERE id=:event_id LIMIT 1');
    $delete->execute([
        ':event_id' => $event_id
    ]);

//    header('Location: javascript://history.go(-1)'); Work to go back to previos page BUT it doesn't reload it so changes doesn't appear
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    }else{
    //message si l'insertion dans la base de données ne s'effectue pas
    echo "L'événement n'a pas pu être supprimé de la base de données.";
}
?>