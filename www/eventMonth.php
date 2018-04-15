<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="img/exia-logo.png"/>
    <title>BDE - Evénement du mois</title>
    <meta name="description" content="Ecvénements du mois du BDE de l'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/eventMonth.min.css">
</head>
<body>

	<?php include '_header.php' ?>

    <div class="wrapper">

        
<!--        .AKL-ctn--c1.banner+.AKL-ctn--c1.event*4>#event-img$.AKL-ctn--c2-s1.event-img+.AKL-ctn--c2-s1.event-infos>span#event-infos-title$.event-infos-title+span#event-infos-date$.event-infos-date+span#event-infos-place$.event-infos-place+span#event-infos-club$.event-infos-club+span#event-infos-price$.event-infos-price+textarea#event-infos-description$.event-infos-description+input#subscribe$.AKL-btnClassic-Flat-ocean.event-infos-subscire-->
       
       <h1 class="AKL-ctn--c1 banner">Evénements du mois</h1>
       
       
<?php  
//conexion à la base de données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');
} catch(PDOException $e){
    die($e->getMessage());
}

//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT * FROM event WHERE eventStatus = 1");
$display->execute();
$i = 1;
$subscribed = false;
//afficher chaque entrée une à une
while ($response = $display->fetch()) {
    
    
    $subs = $bdd->prepare("SELECT last_name, first_name, mail FROM account INNER JOIN register ON register.id_account=account.id WHERE id_event=:mid");
    $subs->execute([
        ':mid' => $response['id']
    ]);
    $count = $subs->rowCount(); // var to know the number of persons registered on each event
    $event = $subs->fetchAll(PDO::FETCH_ASSOC); //Fetch to know if the user registered for each event
    for ($u=0; $u < $count; $u++) {
        if ($event[$u]['mail'] == $_SESSION['mail']) {
            $subscribed = true;
        }
    }
?>
    
    <div id="event<?= $response['id'] ?>" class="AKL-ctn--c1 event">
        <form id="registrationForm<?= $i ?>" action="php/registration.php" method="POST"></form>
        <div class="AKL-ctn--c3-s1 event-img" id="event-img<?= $i ?>" style="background-image: url(photos/popcorn.jpg)"></div>
        <div class="AKL-ctn--c2_3-s1 event-infos">
            <a id="subsCount<?= $i ?>" class="event-infos-subsCount" value="<?= $count ?>" style="background-image: url(img/subscribe_<?= $subscribed ? 'full' : 'empty' ?>.svg)">
                <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
                <div class="event-infos-subsCount-list">
                    <span>Télécharger la liste :</span>
                    <button class="AKL-btnClassic-FlatBorder-hell dlToPdf<?= $i ?>">PDF</button>
                    <button class="AKL-btnClassic-FlatBorder-hell dlToCsv<?= $i ?>">CSV</button>
                    <table>
                        <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Mail</th>
                        </tr>
                        <?php for ($row=0; $row < $count; $row++) { ?>
                        <tr>
                            <td><?= $event[$row]['first_name'] ?></td>
                            <td><?= $event[$row]['last_name'] ?></td>
                            <td><?= $event[$row]['mail'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <?php } ?>
            </a>
            <span id="event-infos-title<?= $i ?>" class="event-infos-title"><?= $response['title'] ?></span>
            <span id="event-infos-place<?= $i ?>" class="event-infos-place"><?= $response['place'] ?></span>
            <span id="event-infos-club<?= $i ?>" class="event-infos-club"><?= $response['club'] ?></span>
            <span id="event-infos-date<?= $i ?>" class="event-infos-date"><?= $response['event_date'] ?></span>
            <span id="event-infos-price<?= $i ?>" class="event-infos-price"><?= $response['price'] ?></span>
            <textarea id="event-infos-description<?= $i ?>" cols="32" rows="4" class="AKL-textareaUnderlined-locked event-infos-description" readonly><?= $response['description'] ?></textarea>
            
            <div class="event-infos-btn">
                <input name="subs_event_id" value="<?= $response['id'] ?>" form="registrationForm<?= $i ?>" readonly hidden>
                <input type="submit" name="subscribe" id="subscribe<?= $i ?>" class="AKL-btnClassic-Flat-ocean event-infos-subscribe" value="<?= $subscribed ? "Se désinscrire" : "S'inscrire" ?>" form="registrationForm<?= $i ?>">
                <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
                <div class="AKL-ctn--c1 event-admin<?= $i ?>" id="<?= $response['id'] ?>"><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
                <?php } ?>
            </div>
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
                <input id="check-eventDone" value="2" name="meventStatus" type="radio" form="administerForm" hidden>
                <label class="check-label">Evénements terminés</label>
            </div>

            <div class="AKL-ctn--c3 radio-blc">
                <label for="check-eventMonth" class="AKL-radio--cross"></label>
                <input id="check-eventMonth" value="1" name="meventStatus" type="radio" form="administerForm" hidden checked>
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
        
<script src="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/eventMonth.min.js"></script>
</body>
</html>