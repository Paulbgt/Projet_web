<?php session_start();
if ($_SESSION['statute'] != 3) {
    header ('Location: eventDone');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="icon" type="image/png" href="site_picture/exia-logo.png"/>
	<title>BDE - REPORT</title>
    <meta name="description" content="element signaler du BDE de site_picturel'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="AKLibrary/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/administration.min.css">
</head>
<body>

	<?php include '_header.php' ?>

    <div class="wrapper">

        <div class="panel">
            <h1 class="panel-title">Panneau d'administration</h1>
            <form id="updateForm" action="php/administration_status" method="POST"></form>
            <table>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Statut</th>
                </tr>

<?php
//conexion à la base de données
try{
    $bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch(PDOException $e){
    die($e->getMessage());
}

//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT account.id, account.last_name, account.first_name, account.mail, account.statute FROM account ORDER BY account.last_name");
$display->execute();
$i = 1;
//afficher chaque entrée une à une
while ($response = $display->fetch()) {
    switch ($response['statute']) {
        case 1 : $status = "Etudiant"; break;
        case 2 : $status = "BDE"; break;
        case 3 : $status = "Salarié"; break;
            default : $status = "Erreur"; break;
    }
?>

                <tr>
                    <td><?= $response['first_name'] ?></td>
                    <td><?= $response['last_name'] ?></td>
                    <td><?= $response['mail'] ?></td>
                    <td><?= $status ?><button type="submit" class="btnChangeStatus" value="<?= $response['id'] ?>" name="account_id" form="updateForm"></button></td>
                </tr>

<?php } ?>
            </table>
        </div>


    </div>


	<?php include '_footer.php' ?>

<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script defer src="js/administration.min.js"></script>
</body>
</html>
