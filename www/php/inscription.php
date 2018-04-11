<?php  
//conexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

//on définit les vraibles avec ce que l'uitlisateurs a rempli dans le formulaire
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$mail = $_POST['mail'];
$pwd = $_POST['pwd'];

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

//si tous les champs sont remplis et que le mail entré n'est déjà pas utiliser, alors on inscrit les données dans la BDD 
$insert = $db->prepare("INSERT INTO account(last_name, first_name, mail, pwd) VALUES(:last_name, :first_name, :mail, :pwd)");

$insert->execute([
    'last_name' => $last_name,
    'first_name' => $first_name,
    'mail' => $mail,
    'pwd' => $pass
]);
    header('Location: /Projet_Web/www/index.php');
}else{
    header('Location: /Projet_Web/www/index.php?error=mail');
}
}

?>