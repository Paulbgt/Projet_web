<?php  


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

	die($e->getMessage());

}

$numEvent = $_POST['numEvent'];
$mtitle = $_POST['mtitle'];
$mdescription = $_POST['mdescription'];
$mdate = $_POST['mdate'];
$mplace = $_POST['mplace'];
$mclub = $_POST['mclub'];
$mprice = $_POST['mprice'];






$v = $bdd->prepare('UPDATE happening SET title=:mtitle, description=:mdescription, event_date=:mdate, place=:mplace, club=:mclub, price=:mprice, Validate = 1 WHERE id=:num LIMIT 1');

$v->execute([

':num' => $numEvent,
':mtitle' => $mtitle,
':mdescription' => $mdescription,
':mdate' => $mdate,
':mplace' => $mplace,
':mclub' => $mclub,
':mprice' => $mprice

]);

header('Location: ideaBox.php')


?>

