<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="site_picture/exia-logo.png"/>
    <title>BDE - Evénements terminés</title>
    <meta name="description" content="Evénements terminés du BDE de l'Exia.Cesi d'Arras."/>
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
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());

}

//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT * FROM event WHERE eventStatus = 2 ORDER BY id DESC");
$display->execute();
$i = 1;

//afficher chaque entrée une à une
while ($response = $display->fetch()) {

$photos = $bdd->prepare("SELECT * FROM event_picture WHERE id_event = :id ORDER BY ref DESC");
$photos->execute(['id' => $response['id']]);





?>
        <div id="event<?= $response['id'] ?>" class="AKL-ctn--c1 event">
            <div class="AKL-ctn--c2-s1 event-img" id="event-img<?= $i ?>">
                <?php $j = 1;
                while($photo = $photos->fetch()) { 

                    $plike= $bdd->prepare("SELECT COUNT(like_event_picture.id_account) as nb_like, id_event_picture FROM like_event_picture where id_event_picture=:id GROUP BY id_event_picture");
                        $plike->execute(['id' => $photo['id']]);
                        $nlike = $plike-> fetch();
                    
                    $pliked= $bdd->prepare("SELECT COUNT(like_event_picture.id_account) as liked FROM like_event_picture WHERE id_event_picture=:id AND id_account=:account_id GROUP BY id_event_picture");
                        $pliked->execute(['id' => $photo['id'], 'account_id' => $_SESSION['id']]);
                        $liked = $pliked-> fetch();
                    ?>
                <form id="likeForm<?= $i.'_'.$j ?>" action="php/like_done.php" method="POST"></form>
                <input class="likeForm<?= $i.'_'.$j ?>" name="<?= $liked ? 'unlike' : 'like' ?>_id" value="<?= $photo['id'] ?>" form="likeForm<?= $i.'_'.$j ?>" readonly hidden>
                <div class="event-img-<?= $i.'_'.$j ?>" liked="<?= $liked ? 'true' : 'false' ?>" value="<?= $nlike['nb_like'] ? $nlike['nb_like'] : 0 ?>" style="background-image: url(event_picture/<?= $response['id'] ?>/<?= $photo['url'] ?>)">
                    <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 3){ ?>

                     <form action="zip.php" method="GET">
                    <button type="submit" value="Télécharger" class="AKL-btnClassic-Flat-hell event-download<?= $i ?>"></button>
                    <input type="number" id="download_id" name="download_id" value="<?= $response['id'] ?>" readonly hidden></form>

                    <?php } ?>
                </div>
                 <?php $j++; } ?>
            </div>
            <div class="AKL-ctn--c2-s1 event-infos">
                <span id="event-infos-title<?= $i ?>" class="event-infos-title"><?= $response['title'] ?></span>
                <span id="event-infos-place<?= $i ?>" class="event-infos-place"><?= $response['place'] ?></span>
                <span id="event-infos-club<?= $i ?>" class="event-infos-club"><?= $response['club'] ?></span>
                <span id="event-infos-date<?= $i ?>" class="event-infos-date"><?= $response['event_date'] ?></span>
<!--                <span id="event-infos-price<?= $i ?>" class="event-infos-price"><?= $response['price'] ?></span>-->
                <textarea id="event-infos-description<?= $i ?>" cols="32" rows="4" class="AKL-textareaUnderlined-locked event-infos-description" readonly><?= $response['description'] ?></textarea>

                <div class="event-infos-btn">
                    <a class="AKL-btnClassic-Flat-ocean event-infos-sendPhoto">Déposer une photo</a>
                    <a class="AKL-btnClassic-Flat-ocean event-infos-comment">Commentaires</a>
                </div>
            </div>
            <div class="AKL-ctn--c2-s1 event-swap" step="0">
                <a class="event-swap-previous"></a>
                <button class="event-swap-like" value="" style="background-image: url(site_picture/like_grey.svg)" type="submit" form="likeForm<?= $i ?>"></button>
                <a class="event-swap-next"></a>
            </div>

            <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
            <div class="AKL-ctn--c2-s1 event-admin<?= $i ?>" id="<?= $response['id'] ?>"><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
            <?php } ?>
            <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 3){ ?>
            <form id="reportForm" action="php/report_event.php" method="POST">
                <input type="submit" value="Signaler" class="AKL-ctn--c2-s1 AKL-btnClassic-Flat-hell event-report<?= $i ?>">
                <input type="number" id="report_event_id" name="report_event_id" value="<?= $response['id'] ?>" readonly hidden>
            </form>
            <?php } ?>

            <div class="AKL-ctn--c2-s1 modalComment">
                <div class="modalComment-close">X</div>
                    Commentaires :
                <div class="modalComment-post">
                    <span class="modalComment-comment-span">Poster un commentaire</span>
                    <a class="modalComment-comment-plus">+</a>
                    <form action="php/add_comment_event_done.php" id="add_commentForm" method="POST">
                    <textarea name="comment" class="AKL-textareaUnderlined-locked-snow modalComment-post-input" rows="4" cols="30" placeholder="Ecrivez votre commentaire ici..."></textarea>
                    <input type="submit" value="Poster" class="AKL-btnClassic-Flat-ocean modalComment-post-btn">
                    <input type="number" id="comment_event_id" name="comment_event_id" value="<?= $response['id'] ?>" readonly hidden>
                    </form>
                </div>

                <?php
                $comments = $bdd->prepare("SELECT commentary.id as id, commentary.com, commentary.id_event as id_event, commentary.id_account as id_account, account.last_name, account.first_name FROM commentary INNER JOIN account ON commentary.id_account = account.id WHERE id_event = :id ORDER BY commentary.id DESC");
                $comments->execute(['id' => $response['id']]);

                while($comment = $comments->fetch()) {
                ?>

                <div class="modalComment-comment">
                    <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
                    <form action="php/delete_comment.php" method="POST">
                    <input type="submit" class="modalComment-delete" value="X">
                    <input type="number" id="comment_id" name="comment_id" value="<?= $comment['id'] ?>" readonly hidden>
                    <?php } ?>
                    <span class="modalComment-comment-span"><?= $comment['first_name'] ?> <?= $comment['last_name'] ?></span>
                    <p class="modamComment-comment-p"><?= $comment['com'] ?></p>
                    </form>
                </div>

                <?php } ?>

            <!-- <div class="modalComment-comment">
                    <span class="modalComment-comment-span">Florian Fritsch</span>
                    <p class="modamComment-comment-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor incidunt quasi illum corporis fugiat animi dolore itaque veritatis laboriosam voluptatem sit quam eos, pariatur sapiente repudiandae, cumque eligendi, consequuntur culpa.</p>
                </div>
                <div class="modalComment-comment">
                    <span class="modalComment-comment-span">Paul Boogaert</span>
                    <p class="modamComment-comment-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores autem repellat nisi quaerat iusto aliquam dicta, libero soluta fugit ad atque excepturi, reiciendis cupiditate. Dignissimos, molestias! Repellendus, hic necessitatibus neque.</p>
                </div> -->
            </div>
            <?php

            $rights = $bdd->prepare("SELECT * FROM register WHERE id_event = :id_event AND id_account = :id_account");
            $rights->execute([
                'id_event' => $response['id'],
                'id_account' => $_SESSION['id']
                            ]);

            $right = $rights->fetch();

            if($right['id_account'] == $_SESSION['id'] OR isset($_SESSION['statute']) && $_SESSION['statute'] == 2) { ?>
            <form action="php/add_photo_event_done.php" id="add_imageForm" method="POST" enctype="multipart/form-data">
                <div class="AKL-ctn--c2-s1 modalPhoto">
                        <label for="fileImgModalPhoto<?= $i ?>" class="AKL-btnClassic-Flat-ocean modalPhoto-inputLabel">Choisir une image</label>
                        <input type="file" name="image" id="fileImgModalPhoto<?= $i ?>" class="AKL-btnFile" class="modalPhoto-input" hidden>
                        <input type="submit" class="AKL-btnClassic-Flat-ocean modalPhoto-submit" value="Valider">
                        <input type="number" id="photo_event_id" name="photo_event_id" value="<?= $response['id'] ?>" readonly hidden>
                </div>
            </form>
            <?php } ?>
        </div>

<?php
$i++; }
$display->closeCursor();
?>

    </div>



    <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
    <form id="administerForm" action="php/administer_event.php" method="POST" enctype="multipart/form-data"></form>        
    <div class="backgroundModal">
        <div class="AKL-ctn--c3_4-s1 modal -dark">
            <span class="modal-title">Editer l'événement</span>
            <div class="modal-close">X</div>
            <div class="AKL-ctn--c2-s1 modal-img">
                <label for="fileImgModal" class="AKL-btnClassic-Flat-ocean">Changer d'image</label>
                <input type="file" id="fileImgModal" name="image" class="AKL-btnFile" hidden>
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
                    
                    <form id="deleteForm" action="php/delete_event.php" method="POST"></form>
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
<script src="js/eventDone.js"></script>
</body>
</html>
