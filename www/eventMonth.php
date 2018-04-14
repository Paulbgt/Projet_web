<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="" type="icon/png">
    <title>BDE - Evénement du mois</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/eventMonth.min.css">
</head>
<body>
    <div class="wrapper">

	<?php include '_header.php' ?>
        
<!--        .AKL-ctn--c1.banner+.AKL-ctn--c1.event*4>#event-img$.AKL-ctn--c2-s1.event-img+.AKL-ctn--c2-s1.event-infos>span#event-infos-title$.event-infos-title+span#event-infos-date$.event-infos-date+span#event-infos-place$.event-infos-place+span#event-infos-club$.event-infos-club+span#event-infos-price$.event-infos-price+textarea#event-infos-description$.event-infos-description+input#subcribe$.AKL-btnClassic-Flat-ocean.event-infos-subscire-->
       
       <div class="AKL-ctn--c1 banner">Evénements du mois</div>
       
       <div class="AKL-ctn--c1 event">
           <div id="event-img1" class="AKL-ctn--c2-s1 event-img"></div>
           <div class="AKL-ctn--c2-s1 event-infos">
               <span id="event-infos-title1" class="event-infos-title"></span>
               <span id="event-infos-date1" class="event-infos-date"></span>
               <span id="event-infos-place1" class="event-infos-place"></span>
               <span id="event-infos-club1" class="event-infos-club"></span>
               <span id="event-infos-price1" class="event-infos-price"></span>
               <textarea name="" id="event-infos-description1" cols="30" rows="4" class="event-infos-description"></textarea>
               <input type="submit" id="subcribe1" class="AKL-btnClassic-Flat-ocean event-infos-subscire">
           </div>
           <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
           <div class="AKL-ctn--c1 idea-admin1" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
           <?php } ?>
       </div>
       <div class="AKL-ctn--c1 event">
           <div id="event-img2" class="AKL-ctn--c2-s1 event-img"></div>
           <div class="AKL-ctn--c2-s1 event-infos">
               <span id="event-infos-title2" class="event-infos-title"></span>
               <span id="event-infos-date2" class="event-infos-date"></span>
               <span id="event-infos-place2" class="event-infos-place"></span>
               <span id="event-infos-club2" class="event-infos-club"></span>
               <span id="event-infos-price2" class="event-infos-price"></span>
               <textarea name="" id="event-infos-description2" cols="30" rows="4" class="event-infos-description"></textarea>
               <input type="submit" id="subcribe2" class="AKL-btnClassic-Flat-ocean event-infos-subscire">
           </div>
           <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
           <div class="AKL-ctn--c1 idea-admin2" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
           <?php } ?>
       </div>
       <div class="AKL-ctn--c1 event">
           <div id="event-img3" class="AKL-ctn--c2-s1 event-img"></div>
           <div class="AKL-ctn--c2-s1 event-infos">
               <span id="event-infos-title3" class="event-infos-title"></span>
               <span id="event-infos-date3" class="event-infos-date"></span>
               <span id="event-infos-place3" class="event-infos-place"></span>
               <span id="event-infos-club3" class="event-infos-club"></span>
               <span id="event-infos-price3" class="event-infos-price"></span>
               <textarea name="" id="event-infos-description3" cols="30" rows="4" class="event-infos-description"></textarea>
               <input type="submit" id="subcribe3" class="AKL-btnClassic-Flat-ocean event-infos-subscire">
           </div>
           <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
           <div class="AKL-ctn--c1 idea-admin3" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
           <?php } ?>
       </div>
       <div class="AKL-ctn--c1 event">
           <div id="event-img4" class="AKL-ctn--c2-s1 event-img"></div>
           <div class="AKL-ctn--c2-s1 event-infos">
               <span id="event-infos-title4" class="event-infos-title"></span>
               <span id="event-infos-date4" class="event-infos-date"></span>
               <span id="event-infos-place4" class="event-infos-place"></span>
               <span id="event-infos-club4" class="event-infos-club"></span>
               <span id="event-infos-price4" class="event-infos-price"></span>
               <textarea name="" id="event-infos-description4" cols="30" rows="4" class="event-infos-description"></textarea>
               <input type="submit" id="subcribe4" class="AKL-btnClassic-Flat-ocean event-infos-subscire">
           </div>
           <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
           <div class="AKL-ctn--c1 idea-admin4" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
           <?php } ?>
       </div>
        
    </div>
        
        
        
    <?php include '_footer.php' ?>

    <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
    <div class="backgroundModal">
        <div class="AKL-ctn--c3_4-s1 modal -dark">
            <form action="php/validate_event_bdd.php" method="POST">
                <span class="modal-title">Editer l'événement</span>
                <div class="modal-close">X</div>
                <div class="AKL-ctn--c2-s1 modal-img">
                    <label for="fileImgModal" class="AKL-btnClassic-Flat-ocean">Changer d'image</label>
                    <input type="file" id="fileImgModal" class="AKL-btnFile" hidden>
                </div>
                <div class="AKL-ctn--c2-s1 modal-infos">
                    <input type="text" placeholder="Titre de l'idée" class="AKL-inputUnderlined modal-infos-title" id="mtitle" name="mtitle">
                    <input type="text" placeholder="Lieu" class="AKL-inputUnderlined modal-infos-place" id="mplace" name="mplace">
                    <input type="text" placeholder="Club" class="AKL-inputUnderlined modal-infos-club" id="mclub" name="mclub">
                    <input type="text" placeholder="Date" class="AKL-inputUnderlined modal-infos-date" id="mdate" name="mdate">
                    <input type="text" placeholder="Prix" class="AKL-inputUnderlined modal-infos-price" id="mprice" name="mprice">
                    <textarea placeholder="Description" cols="30" rows="4" class="AKL-textareaUnderlined-locked modal-infos-description" id="mdescription" name="mdescription"></textarea>
                    <input type="number" class="modal-infos-id" id="numEvent" name="numEvent" readonly hidden>
                    <input type="submit" class="AKL-btnClassic-Flat-ocean modal-infos-submit" value="Sauvegarder"/>
                </div>
                <div class="AKL-ctn--c3 radio-blc">
                    <label for="check-eventDone" class="AKL-radio--cross"></label>
                    <input id="check-eventDone" value="2" name="checkCategory" type="radio" hidden>
                    <label class="check-label">Evénements terminés</label>
                </div>

                <div class="AKL-ctn--c3 radio-blc">
                    <label for="check-eventMonth" class="AKL-radio--cross"></label>
                    <input id="check-eventMonth" value="1" name="checkCategory" type="radio" hidden>
                    <label class="check-label">Evénements du mois</label>
                </div>

                <div class="AKL-ctn--c3 radio-blc">
                    <label for="check-eventIdea" class="AKL-radio--cross"></label>
                    <input id="check-eventIdea" value="0" name="checkCategory" type="radio" hidden checked>
                    <label class="check-label">Boite à idée</label>
                </div>
            </form>
        </div>
    </div>
    <?php } ?>
       
        
    <script src="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.js"></script>
    <script src="js/common.min.js"></script>
    <script src="js/eventMonth.min.js"></script>
</body>
</html>