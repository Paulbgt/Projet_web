<?php session_start();  

//conexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

//on définit les vraibles avec ce que l'uitlisateurs a rempli dans le formulaire et on sécurise les variables
$lmail = htmlspecialchars($_POST['lmail']);
$lpwd = htmlspecialchars($_POST['lpwd']);

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
			$_SESSION['id'] = $result['id'];


			$ez = $db->prepare("SELECT id FROM orders WHERE id_account = :idaccount AND statute='panier'");
			$ez->execute([
				'idaccount'=> $_SESSION['id']
			]);
			$resultpanier=null;
			$resultpanier=$ez->fetch();
				if($resultpanier)
				{
					$_SESSION['id_order'] = 10;
					//$resultpanier['id'];
				}
				else{
					$eza = $db->prepare("INSERT INTO orders statute, id_account VALUES 'panier',:idaccount");
					$eza->execute([
					'idaccount' => $_SESSION['id']
				]);
					$_SESSION['id_order'] = 8;
				//$db->lastInsertId();
				}

			header('Location: ../ideaBox');

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