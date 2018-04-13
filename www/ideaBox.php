<?php session_start();  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="icon" type="image/png" href="img/exia-logo.png"/>
	<title>BDE - Boite à idée</title>
    <meta name="description" content="Site web du BDE de l'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="AKLibrary/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/ideaBox.min.css">
</head>
<body>

	<?php include '_header.php' ?>

<!--.wrapper>.AKL-ctn--c1.banner+(.AKL-ctn--c1.displaySuggestion>.AKL-ctn--c2-s3_4.suggestion>span.suggestion-title+(.AKL-ctn--c2-s1.suggestion-img>label.AKL-btnClassic-Flat-ocean+input#fileImg.AKL-btnFile)+.AKL-ctn--c2-s1.suggestion-infos>input.suggestion-infos-title+input.suggestion-infos-date+input.suggestion-infos-place+input.suggestion-infos-club+input.suggestion-infos-price+input.suggestion-infos-description+.AKL-btnClassic-Flat-ocean)+.AKL-ctn--c2-s1.idea*8>#idea-img$.AKL-ctn--c2-s1.idea-img+.AKL-ctn--c2-s1.idea-infos>span#idea-infos-title$.idea-infos-title+span#idea-infos-date$.idea-infos-date+span#idea-infos-place$.idea-infos-place+span#idea-infos-club$.idea-infos-club+span#idea-infos-price$.idea-infos-price+textarea#idea-infos-description$.idea-infos-description-->

<div class="wrapper">
    <h1 class="AKL-ctn--c1 banner">Boite à idée</h1>
    <div class="AKL-ctn--c1 blcSuggestion">
        <a id="displaySuggestion" class="AKL-btnClassic-Flat-ocean">Proposer une idée</a>
        <div class="AKL-ctn--c3_4-s1 suggestion">
            <a class="suggestion-title">Proposer une idée</a>
            















            <form action="php/suggest_event_add.php" method="POST">
                <div class="AKL-ctn--c2-s1 suggestion-img">
                    <label for="fileImg" class="AKL-btnClassic-Flat-ocean">Choisir une image</label>
                    <input type="file" id="fileImg" class="AKL-btnFile" hidden>
                </div>
                <div class="AKL-ctn--c2-s1 suggestion-infos">
                    <input type="text" name="title" id="title" placeholder="Titre de l'idée" class="AKL-inputUnderlined suggestion-infos-title">
                    <label class="form-error" for="title"></label>
                    <input type="text" name="event_date" id="event_date" placeholder="Date" class="AKL-inputUnderlined suggestion-infos-date">
                    <input type="text" name="place" id="place" placeholder="Lieu" class="AKL-inputUnderlined suggestion-infos-place">
                    <input type="text" name="club" id="club" placeholder="Club" class="AKL-inputUnderlined suggestion-infos-club">
                    <input type="text" name="price" id="price" placeholder="Prix" class="AKL-inputUnderlined suggestion-infos-price"> 
                    <textarea placeholder="Description" name="description" id="description" cols="30" rows="4" class="AKL-textareaUnderlined-locked suggestion-infos-description"></textarea>
                    <label class="form-error" for="description"></label>
              
                    <input type="submit" name="validation date_event" class="AKL-btnClassic-Flat-ocean suggestion-infos-submit" id="submitIdea"/>
                      
                </div>
            </form>
            
        </div>
    </div>









<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

    die($e->getMessage());

}

//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT * FROM happening WHERE Validate = 1");
$display->execute();

//afficher chaque entrée une à une
while ($response = $display->fetch()) {
?>



    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img1" style="background-image: url(photos/popcorn.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="20" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title1" class="idea-infos-title"><?= $response['title'] ?></span>
            <span id="idea-infos-place1" class="idea-infos-place"><?= $response['place'] ?></span>
            <span id="idea-infos-club1" class="idea-infos-club"><?= $response['club'] ?></span>
            <span id="idea-infos-date1" class="idea-infos-date"><?= $response['event_date'] ?></span>
            <span id="idea-infos-price1" class="idea-infos-price"><?= $response['price'] ?></span>
            <textarea name="" id="idea-infos-description1" cols="32" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly><?= $response['description'] ?></textarea>
        </div>
    </div>




<?php 
}
$display->closeCursor();

?>




























    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img1" style="background-image: url(photos/popcorn.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="20" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title1" class="idea-infos-title">Vente de pop-corn</span>
            <span id="idea-infos-place1" class="idea-infos-place">50 rue du Coquelicot, Tatouin</span>
            <span id="idea-infos-club1" class="idea-infos-club">exia-miam</span>
            <span id="idea-infos-date1" class="idea-infos-date">15 avril</span>
            <span id="idea-infos-price1" class="idea-infos-price">2€</span>
            <textarea name="" id="idea-infos-description1" cols="32" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Exia-miam organise une vente de pop-corn qui ne nous a quasiment rien coûté mais qui va nous permettre de bien nous remplir les bourses.
Cdlmt.</textarea>
        </div>






	<?php include '_footer.php' ?>

<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/ideaBox.min.js"></script>
<script src="js/ideaBoxValidation.js"></script>
</body>
</html>