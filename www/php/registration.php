<?php session_start(); ?>

<?php

try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}

$event_id = $_POST['subs_event_id'];
$account_id = $_SESSION['id'];

//Javascript is acting before php, so the name (POST value) has already changed before the form has been submitted, so we have to inverse the condition.
if ($_POST['subscribe'] == "S'inscrire") {
    $register = $bdd->prepare('DELETE FROM register WHERE id_account=:account_id AND id_event=:event_id');
} else if ($_POST['subscribe'] == "Se désinscrire") {
    $register = $bdd->prepare('INSERT INTO register(id_account, id_event) VALUES(:account_id, :event_id)');
} else {
    //message if $_POST['subscribe'] is empty
    echo "L'événement n'a pas pu être ajouté à la base de données.";
}


//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($event_id)) {
    //requête permettant de supprimer l'événement
    $register->execute([
        ':event_id' => $event_id,
        ':account_id' => $account_id
    ]);
    
    //Work to go back to previous page BUT it doesn't reload it so changes doesn't appear
    header('Location: javascript://history.go(-1)'); 

    }else{
    //message si l'insertion dans la base de données ne s'effectue pas
    echo "L'événement n'a pas pu être ajouté à la base de données.";
}
?>