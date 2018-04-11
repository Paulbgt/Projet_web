<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Session</title>
</head>
<body>
<p>Votre Email : 
<?php 
	echo($_SESSION['mail']); 
?></p>


</body>
</html>