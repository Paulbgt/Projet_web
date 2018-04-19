<!-- // *[English]* This function allows to connect to the site with his account, it checks if the entered email corresponds to those registered in the database and if the password corresponds to the one entered by the user. -->
<!-- // *[Français]* Cette fonction permet de se connecter au site avec son compte, elle vérifie si le mail entré correspond à ceux inscrit dans la base de données et si le mot de passe correspond à celui entré par l'utilisateur. -->

<?php session_start();
//conexion à la base de données
$db = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
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
			$ez = $db->prepare("SELECT * FROM orders WHERE id_account = :idaccount AND statute='panier'");
			$ez->execute(['idaccount'=> $_SESSION['id']]);
			$resultpanier=null;
			$resultpanier=$ez->fetch();
				if($resultpanier){$_SESSION['id_order'] = $resultpanier['id'];}
				else{$eza = $db->prepare("INSERT INTO orders (statute, id_account) VALUES ('panier',:idaccount)");
					$eza->execute(['idaccount' => $_SESSION['id']]);
					$_SESSION['id_order'] = $db->lastInsertId();
				}
			header('Location: ../ideaBox');
			exit();
		}
		else{
			echo "le mot de passe est incorrecte";
			exit();
		}
	}
	//le mail inscrit dans l'onglet connexion n'existe pas dans la base de données.
	else{echo "le mail " . $lmail . " n'existe pas";}
}
else{echo "veuillez completer tous les champs";}
?>
