<?php session_start();  

//conexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');


//on définit les vraibles avec ce que l'uitlisateurs a rempli dans le formulaire

$lmail = $_POST['lmail'];
$lpwd = $_POST['lpwd'];

if (!empty($lmail) && !empty($lpwd)) {

	$q = $db->prepare("SELECT * FROM account WHERE mail = :mail");
	$q->execute(['mail' => $lmail]
	);

	$result = $q->fetch();

	if ($result == true) {


		$pass = $result['pwd'];
		if (password_verify($lpwd, $pass)) {

			$_SESSION['mail'] = $result['mail'];
			$_SESSION['first_name'] = $result['first_name'];
			$_SESSION['last_name'] = $result['last_name'];
			$_SESSION['statute'] = $result['statute'];

			echo($_SESSION['mail']);
			echo($_SESSION['first_name']);
			echo($_SESSION['last_name']);
			echo($_SESSION['statute']);

			header('Location: /Projet_Web/www/index.php');

			exit();


		}
		else{
			echo "le mot de passe est incorrecte";
			
			exit();
		}


	}
	else{
		//le mail inscrit dans l'onglet connexion n'existe pas dans la base de données.
		echo "le mail " . $lmail . " n'existe pas";
	}


}
else
{
	echo "veuillez completer tous les champs";
}





?>