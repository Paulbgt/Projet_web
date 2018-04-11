<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Suggestion de statut</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Suggestion d'événement</h1>
<form action="suggest_event_add.php" method="POST">
	<input type="text" name="title" id="title">

	<br><br>

	<input type="text" name="description" id="description">


	<br><br>

	<p>Date de l'événement</p>
	<input type="date" name="event_date" id="event_date">
	
	<br><br>

	<input type="submit" name="validation date_event">




</form>



</body>
</html>