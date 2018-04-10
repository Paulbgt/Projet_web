<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="icon" type="image/png" href="img/exia-logo.png"/>
	<title>BDE Connexion</title>
    <meta name="description" content="Site web du BDE de l'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/index.min.css">
</head>
<body>

	<?php include '_header.php' ?>

    <div class="wrapper">
       
        <div class="authentication">
            <img class="exiaPart-grey1" src="img/exia-logo-grey1.png" alt="Logo exia partie gris 1">
            <img class="exiaPart-grey2" src="img/exia-logo-grey2.png" alt="Logo exia partie gris 2">
            <img class="exiaPart-red" src="img/exia-logo-red.png" alt="Logo exia partie rouge">
            <div class="form">
                <div class="form-btnRegister">Inscription</div>
                <div class="form-btnConnection">Connexion</div>

                <div class="form-register">
                    <form action="">
                        <input class="AKL-inputUnderlined form-register-input" placeholder="Nom">
                        <input class="AKL-inputUnderlined form-register-input" placeholder="Prenom">
                        <input class="AKL-inputUnderlined form-register-input" placeholder="Mot de passe">
                        <input class="AKL-inputUnderlined form-register-input" placeholder="E-mail">
                        <input type="submit" value="S'inscrire" class="AKL-btnModern form-register-validate">
                    </form>
                </div>
                <div class="form-connection">
                    <form action="">
                        <input class="AKL-inputUnderlined form-connection-input" placeholder="E-mail">
                        <input class="AKL-inputUnderlined form-connection-input" placeholder="Mot de passe">
                        <input type="submit" value="Se connecter" class="AKL-btnModern form-connection-validate">
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>



	<?php include '_footer.php' ?>

<script src="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/index.min.js"></script>
</body>
</html>