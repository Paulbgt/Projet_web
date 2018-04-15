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

//    Work to go back to previous page WITH reloading it, so changes appear
//    header('Location: ' . $_SERVER['HTTP_REFERER']);
//    Work to go back to previous page WHITOUT reloading it, so changes doesn't appear
    header('Location: javascript://history.go(-1)'); 

    }else{
    //message si l'insertion dans la base de données ne s'effectue pas
    echo "L'événement n'a pas pu être supprimé de la base de données.";
}
?>