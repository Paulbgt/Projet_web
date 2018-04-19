<?php


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){
	die($e->getMessage());
}
$report_idea = $_POST['report_idea_id'];
$report_event = $_POST['report_event_id'];

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($report_idea)) {
    //requête permettant de supprimer l'événement
    $report = $bdd->prepare('UPDATE event SET eventStatus = "3" WHERE id = :report_idea LIMIT 1');
    $report->execute([':report_idea' => $report_idea]);
//    Work to go back to previous page WITH reloading it, so changes appear
//    header('Location: ' . $_SERVER['HTTP_REFERER']);
//    Work to go back to previous page WHITOUT reloading it, so changes doesn't appear
    header('Location: javascript://history.go(-1)');
    }
		else if(!empty($report_event)){
    	//requête permettant de supprimer l'événement
    $report = $bdd->prepare('UPDATE event SET eventStatus = "3" WHERE id = :report_event LIMIT 1');
    $report->execute([':report_event' => $report_event]);
//    Work to go back to previous page WITH reloading it, so changes appear
//    header('Location: ' . $_SERVER['HTTP_REFERER']);
//    Work to go back to previous page WHITOUT reloading it, so changes doesn't appear
    header('Location: javascript://history.go(-1)'); 
	}else{
    //message si l'insertion dans la base de données ne s'effectue pas
    echo "L'événement n'a pas pu être supprimé de la base de données.";
}
?>
