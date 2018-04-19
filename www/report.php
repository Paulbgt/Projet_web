<?php session_start();
if ($_SESSION['statute'] != 2) {
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
    <link rel="stylesheet" href="css/ideaBox.min.css">
</head>
<body>

	<?php include '_header.php' ?>

<!--.wrapper>.AKL-ctn--c1.banner+(.AKL-ctn--c1.displaySuggestion>.AKL-ctn--c2-s3_4.suggestion>span.suggestion-title+(.AKL-ctn--c2-s1.suggestion-img>label.AKL-btnClassic-Flat-ocean+input#fileImg.AKL-btnFile)+.AKL-ctn--c2-s1.suggestion-infos>input.suggestion-infos-title+input.suggestion-infos-date+input.suggestion-infos-place+input.suggestion-infos-club+input.suggestion-infos-price+input.suggestion-infos-description+.AKL-btnClassic-Flat-ocean)+.AKL-ctn--c2-s1.idea*8>#idea-img$.AKL-ctn--c2-s1.idea-img+.AKL-ctn--c2-s1.idea-infos>span#idea-infos-title$.idea-infos-title+span#idea-infos-date$.idea-infos-date+span#idea-infos-place$.idea-infos-place+span#idea-infos-club$.idea-infos-club+span#idea-infos-price$.idea-infos-price+textarea#idea-infos-description$.idea-infos-description-->

<div class="wrapper">
    <h1 class="AKL-ctn--c1 banner">Eléments signalés</h1>
    <div></div> <!-- Useless div just for the checkerboard color -->


<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());

}

//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT COUNT(like_event.id_account) as nb_like,event.id, event.title, event.description, event.event_date,event.place,event.club,event.price,event_picture.url  FROM (like_event right JOIN event ON like_event.id_event=event.id) LEFT join event_picture ON event.id=event_picture.id_event where event.eventStatus = 3 GROUP BY event.id");
$display->execute();
$i = 1;
$liked = false;
//afficher chaque entrée une à une
while ($response = $display->fetch()) {


    //request to get list of likes
    $subs = $bdd->prepare("SELECT id_account from like_event where id_event=:idevent AND id_account=:idaccount");
    $subs->execute([
        ':idevent' => $response['id'],
        ':idaccount' => $_SESSION['id']
    ]);
		$liked = $subs->fetchAll();

		//echo ('event_picture/'.$response['id'].'/'.$response['url']);
?>


    <div id="idea<?= $response['id'] ?>" class="AKL-ctn--c2-t1 idea">
        <form id="likeForm<?= $i ?>" action="php/like.php" method="POST"></form>
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img<?= $i ?>" style="background-image: url(<?=('event_picture/'.$response['id'].'/'.$response['url'])?>)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">

            <input class="likeForm<?= $i ?>" name="<?= $liked ? 'unlike' : 'like' ?>_id" value="<?= $response['id'] ?>" form="likeForm<?= $i ?>" readonly hidden>
            <button type="submit" class="idea-infos-like" value="<?= $response['nb_like'] ?>" style="background-image: url(site_picture/like_<?= $liked ? 'blue' : 'grey' ?>.svg)" form="likeForm<?= $i ?>"></button>

            <span id="idea-infos-title<?= $i ?>" class="idea-infos-title"><?= $response['title'] ?></span>
            <span id="idea-infos-place<?= $i ?>" class="idea-infos-place"><?= $response['place'] ?></span>
            <span id="idea-infos-club<?= $i ?>" class="idea-infos-club"><?= $response['club'] ?></span>
            <span id="idea-infos-date<?= $i ?>" class="idea-infos-date"><?= $response['event_date'] ?></span>
            <span id="idea-infos-price<?= $i ?>" class="idea-infos-price"><?= $response['price'] ?></span>
            <textarea id="idea-infos-description<?= $i ?>" cols="32" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly><?= $response['description'] ?></textarea>
        </div>
        <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
        <div class="AKL-ctn--c1 idea-admin<?= $i ?>" id="<?= $response['id'] ?>"><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
        <?php } ?>
        <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 3){ ?>
        <input type="submit" value="Signaler" class="AKL-ctn--c2-s1 AKL-btnClassic-Flat-hell idea-report<?= $i ?>">
        <input type="number" id="report_idea_id" name="report_idea_id" value="<?= $response['id'] ?>" readonly hidden>
        <?php } ?>
    </div>

<?php
$i++;
$liked = false; }
$display->closeCursor();

?>

</div>

    <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
    <form id="administerForm" action="php/administer_event.php" method="POST"></form>
    <form id="deleteForm" action="php/delete_event.php" method="POST"></form>


    <div class="backgroundModal">
        <div class="AKL-ctn--c3_4-s1 modal -dark">
            <span class="modal-title">Editer l'événement</span>
            <div class="modal-close">X</div>
            <div class="AKL-ctn--c2-s1 modal-img">
                <label for="fileImgModal" class="AKL-btnClassic-Flat-ocean">Changer d'image</label>
                <input type="file" id="fileImgModal" class="AKL-btnFile" hidden>
            </div>
            <div class="AKL-ctn--c2-s1 modal-infos">
                <input type="text" placeholder="Titre de l'idée" class="AKL-inputUnderlined modal-infos-title" id="mtitle" name="mtitle" form="administerForm">
                <input type="text" placeholder="Lieu" class="AKL-inputUnderlined modal-infos-place" id="mplace" name="mplace" form="administerForm">
                <input type="text" placeholder="Club" class="AKL-inputUnderlined modal-infos-club" id="mclub" name="mclub" form="administerForm">
                <input type="text" placeholder="Date" class="AKL-inputUnderlined modal-infos-date" id="mdate" name="mdate" form="administerForm">
                <input type="text" placeholder="Prix" class="AKL-inputUnderlined modal-infos-price" id="mprice" name="mprice" form="administerForm">
                <textarea placeholder="Description" cols="30" rows="4" class="AKL-textareaUnderlined-locked modal-infos-description" id="mdescription" name="mdescription" form="administerForm"></textarea>
                <div class="modal-infos-btn">
                    <input type="number" class="modal-infos-id" id="numEvent" name="mid" form="administerForm" readonly hidden>
                    <input type="submit" class="AKL-btnClassic-Flat-ocean modal-infos-submit" value="Sauvegarder" form="administerForm"/>
                    <input type="submit" class="AKL-btnClassic-Flat-hell modal-infos-delete" value="Supprimer" form="deleteForm"/>
                    <input type="number" class="modal-infos-id-delete" id="event_id" name="event_id" form="deleteForm" readonly hidden>
                </div>
            </div>
            <div class="AKL-ctn--c3 radio-blc">
                <label for="check-eventDone" class="AKL-radio--cross"></label>
                <input id="check-eventDone" value="2" name="meventStatus" type="radio" form="administerForm" hidden>
                <label class="check-label">Evénements terminés</label>
            </div>

            <div class="AKL-ctn--c3 radio-blc">
                <label for="check-eventMonth" class="AKL-radio--cross"></label>
                <input id="check-eventMonth" value="1" name="meventStatus" type="radio" form="administerForm" hidden>
                <label class="check-label">Evénements du mois</label>
            </div>

            <div class="AKL-ctn--c3 radio-blc">
                <label for="check-eventIdea" class="AKL-radio--cross"></label>
                <input id="check-eventIdea" value="0" name="meventStatus" type="radio" form="administerForm" hidden>
                <label class="check-label">Boite à idée</label>
            </div>
        </div>
    </div>
    <?php } ?>

	<?php include '_footer.php' ?>

<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/ideaBox.min.js"></script>
</body>
</html>
