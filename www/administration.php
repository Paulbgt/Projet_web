<?php session_start(); ?>

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
            <table>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Statut</th>
                </tr>
                <tr>
                    <td>Aurélien</td>
                    <td>Klein</td>
                    <td>aurelien.klein@viacesi.fr</td>
                    <td>BDE<a class="btnChangeStatus"></a></td>
                </tr>
                <tr>
                    <td>Romain</td>
                    <td>Brunelot</td>
                    <td>rbrunelot@cesi.fr</td>
                    <td>Salarié</td>
                </tr>
                <tr>
                    <td>Pierre</td>
                    <td>Geraert</td>
                    <td>pierre.geraert@viacesi.fr</td>
                    <td>Etudiant<a class="btnChangeStatus"></a></td>
                </tr>
            </table>
        </div>
        
        
    </div>


	<?php include '_footer.php' ?>

<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script defer src="js/administration.min.js"></script>
</body>
</html>
