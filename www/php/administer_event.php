<?php  


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}

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

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>

