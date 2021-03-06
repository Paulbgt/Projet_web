<?php session_start(); ?>

<?php

try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

	die($e->getMessage());

}

if (!empty($_POST['like_id'])) {
    $like_id = $_POST['like_id'];
    $delete = $bdd->prepare('INSERT INTO like_event(id_account, id_event) VALUES(:account_id, :like_id)');
} else if (!empty($_POST['unlike_id'])) {
    $like_id = $_POST['unlike_id'];
    $delete = $bdd->prepare('DELETE FROM like_event WHERE id_account=:account_id AND id_event=:like_id');
} else {
    //message si l'insertion dans la base de données ne s'effectue pas
    echo "L'événement n'a pas pu être ajouté à la base de données.";
}

$account_id = $_SESSION['id'];

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($like_id)) {
    //requête permettant de supprimer l'événement
    $delete->execute([
        ':like_id' => $like_id,
        ':account_id' => $account_id
    ]);
    
    //Work to go back to previous page BUT it doesn't reload it so changes doesn't appear
    header('Location: javascript://history.go(-1)'); 
//    header('Location: ../ideaBox'); 

    }else{
    //message si l'insertion dans la base de données ne s'effectue pas
    echo "L'événement n'a pas pu être ajouté à la base de données.";
}
?>