<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="site_picture/exia-logo.png"/>
    <title>BDE - Evénements terminés</title>
    <meta name="description" content="Ecvénements du mois du BDE de l'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="AKLibrary/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/eventDone.min.css">
</head>
<body>

	<?php include '_header.php' ?>
   
    <div class="wrapper">
        
        <h1 class="AKL-ctn--c1 banner">Evénements terminés</h1>
    
<?php  
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

    die($e->getMessage());

}

//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT * FROM event WHERE eventStatus = 2 ORDER BY id DESC");
$display->execute();
$i = 1;
//$liked = false;
//afficher chaque entrée une à une
while ($response = $display->fetch()) {
    
    
    //request to get list of likes
//    $subs = $bdd->prepare("SELECT last_name, first_name, mail FROM account INNER JOIN like_event ON like_event.id_account=account.id WHERE id_event=:mid");
//    $subs->execute([
//        ':mid' => $response['id']
//    ]);
//    $count = $subs->rowCount(); // var to know the number of likes on each idea
//    $event = $subs->fetchAll(PDO::FETCH_ASSOC); //Fetch to know if the user liked for each idea
//    for ($u=0; $u < $count; $u++) {
//        if ($event[$u]['mail'] == $_SESSION['mail']) {
//            $liked = true;
//        }
//    }
?>
        
        <div id="event<?= $response['id'] ?>" class="AKL-ctn--c1 event">
            <div class="AKL-ctn--c2-s1 event-img" id="event-img<?= $i ?>">
                <div class="event-img-<?= $i ?>" liked="false" value="2" style="background-image: url(event_picture/popcorn.jpg)"></div>
                <div class="event-img-<?= $i ?>" liked="false" value="0" style="background-image: url(event_picture/foot.jpg)"></div>
                <div class="event-img-<?= $i ?>" liked="false" value="6" style="background-image: url(event_picture/barbecue.jpg)"></div>
            </div>
            <div class="AKL-ctn--c2-s1 event-infos">
                <span id="event-infos-title<?= $i ?>" class="event-infos-title"><?= $response['title'] ?></span>
                <span id="event-infos-place<?= $i ?>" class="event-infos-place"><?= $response['place'] ?></span>
                <span id="event-infos-club<?= $i ?>" class="event-infos-club"><?= $response['club'] ?></span>
                <span id="event-infos-date<?= $i ?>" class="event-infos-date"><?= $response['event_date'] ?></span>
<!--                <span id="event-infos-price<?= $i ?>" class="event-infos-price"><?= $response['price'] ?></span>-->
                <textarea id="event-infos-description<?= $i ?>" cols="32" rows="4" class="AKL-textareaUnderlined-locked event-infos-description" readonly><?= $response['description'] ?></textarea>
                
                <div class="event-infos-btn">
                    <input type="submit" name="" id="" class="AKL-btnClassic-Flat-ocean event-infos-sendPhoto" value="Déposer une photo">
                    <a class="AKL-btnClassic-Flat-ocean event-infos-comment">Commentaires</a>
                </div>
                    <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
                    <div class="AKL-btnClassic-Flat-dark event-admin<?= $i ?>" id="<?= $response['id'] ?>">Administrer</div>
                    <?php } ?>
            </div>
            <div class="AKL-ctn--c2-s1 event-swap" step="0">
                <a class="event-swap-previous"></a>
                <a class="event-swap-like" value="2" style="background-image: url(site_picture/like_grey.svg)"></a>
                <a class="event-swap-next"></a>
            </div>
        </div>

       
<?php
$i++;
$subscribed = false; }
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
                <input id="check-eventDone" value="2" name="meventStatus" type="radio" form="administerForm" hidden checked>
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
<script src="js/eventDone.min.js"></script>
</body>
</html>