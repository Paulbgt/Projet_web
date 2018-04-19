<?php  
//conexion à la base de données
$db = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

//on définit les vraibles avec ce que l'uitlisateurs a rempli dans le formulaire et on sécurise les variables
$last_name = htmlspecialchars($_POST['last_name']);
$first_name = htmlspecialchars($_POST['first_name']);
$mail = htmlspecialchars($_POST['mail']);
$pwd = htmlspecialchars($_POST['pwd']);

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($last_name) && !empty($first_name) && !empty($mail) && !empty($pwd)) {

//tableau permettant de crypter le mot de passe de l'utilisateur
$options = [
    'cost' => 12,
];

//fonction permettant de crypter le mot de passe avec BCRYPT
$pass = password_hash($pwd, PASSWORD_BCRYPT, $options);


//requpete préparée qui permet de voir si le mail n'est déjà pas utilisé
$control = $db->prepare("SELECT mail FROM account WHERE mail = :mail");
$control->execute([
    'mail' => $mail
]);

$result = $control->rowCount();

if($result == 0){

$part = explode("@", $mail);

switch($part[1]){
	case 'viacesi.fr' : $statute = "1"; break;
	case 'cesi.fr' : $statute = "3"; break;
	default : $statute = "0"; break;
}

//si tous les champs sont remplis et que le mail entré n'est déjà pas utiliser, alors on inscrit les données dans la BDD 
$insert = $db->prepare("INSERT INTO account(last_name, first_name, mail, pwd, statute) VALUES(:last_name, :first_name, :mail, :pwd, :statute)");

$insert->execute([
    'last_name' => $last_name,
    'first_name' => $first_name,
    'mail' => $mail,
    'pwd' => $pass,
    'statute' => $statute
]);
    header('Location: /Projet_Web/www/index.php');
}else{
    header('Location: /Projet_Web/www/index.php?error=mail');
}
}

?>