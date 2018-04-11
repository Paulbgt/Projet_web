<?php  

//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8', 'root', '');

//on définit les vraibles avec ce que l'uitlisateurs a rempli dans le formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

//on vérifie que le champs ne sont pas vide avant de remplir la base de données
if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp)) {

//tableau permettant de crypter le mot de passe de l'utilisateur
$options = [
    'cost' => 12,
];

//fonction permettant de crypter le mot de passe avec BCRYPT
$pass = password_hash($mdp, PASSWORD_BCRYPT, $options);


//requpete préparée qui permet de voir si le mail n'est déjà pas utilisé
$control = $bdd->prepare("SELECT mail FROM utilisateur WHERE mail = :mail");
$control->execute([
    'mail' => $mail
]);

$result = $control->rowCount();

if($result == 0){

//si tous les champs sont remplis et que le mail entré n'est déjà pas utiliser, alors on inscrit les données dans la BDD 
$insert = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES(:nom, :prenom, :mail, :mdp)");

$insert->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'mail' => $mail,
    'mdp' => $pass
]);
    echo "compte OK";
}else{
    echo "mail existe deja";
}
}

?>