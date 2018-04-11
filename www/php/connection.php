<?php session_start();  

//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8', 'root', '');


//on définit les vraibles avec ce que l'uitlisateurs a rempli dans le formulaire

$lmail = $_POST['lmail'];
$lmdp = $_POST['lmdp'];

if (!empty($lmail) && !empty($lmdp)) {

	$q = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
	$q->execute(['mail' => $lmail]
	);

	$result = $q->fetch();

	if ($result == true) {


		$pass = $result['mdp'];
		if (password_verify($lmdp, $pass)) {

			$_SESSION['mail'] = $result['mail'];
			$_SESSION['prenom'] = $result['prenom'];
			$_SESSION['nom'] = $result['nom'];
			$_SESSION['statut'] = $result['statut'];

			header('Location: /Projet_Web/www/index.php');
			exit();



			//$_SESSION['mail'] = $result['mail'];


		}
		else{
			echo "le mot de passe pas bon";
			
			exit();
		}


	}
	else{
		//le mail inscrit dans l'onglet connexion n'existe pas dans la base de données.
		echo "le mail " . $lmail . " existe pas";
	}


}
else
{
	echo "veuillez completer tous les champs";
}





?>