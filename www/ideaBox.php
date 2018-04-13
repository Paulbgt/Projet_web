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














<!--

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
        <div class="AKL-ctn--c1 idea-admin1" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img2" style="background-image: url(photos/foot.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="20" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title2" class="idea-infos-title">Football</span>
            <span id="idea-infos-place2" class="idea-infos-place">Terrain de Dainville</span>
            <span id="idea-infos-club2" class="idea-infos-club">Bureau des Sports</span>
            <span id="idea-infos-date2" class="idea-infos-date">Tout les jeudi</span>
            <span id="idea-infos-price2" class="idea-infos-price">Gratuit</span>
            <textarea name="" id="idea-infos-description2" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, eveniet nesciunt necessitatibus fugiat velit ducimus, accusantium soluta quod officiis sequi aliquid at vitae labore porro ab perferendis in numquam eligendi.</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin2" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img3" style="background-image: url(photos/lan.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="0" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title3" class="idea-infos-title">LAN</span>
            <span id="idea-infos-place3" class="idea-infos-place">Cesi</span>
            <span id="idea-infos-club3" class="idea-infos-club">Exia Lan</span>
            <span id="idea-infos-date3" class="idea-infos-date">18 avril</span>
            <span id="idea-infos-price3" class="idea-infos-price">Gratuit</span>
            <textarea name="" id="idea-infos-description3" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit hic ullam quisquam cum expedita alias, ut mollitia eum cumque illo maxime quam ex praesentium blanditiis, impedit enim. Error quod, nulla.</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin3" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img5" style="background-image: url(photos/nyancat.png)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="0" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title5" class="idea-infos-title">La magie du nyancat</span>
            <span id="idea-infos-place5" class="idea-infos-place">Partout</span>
            <span id="idea-infos-club5" class="idea-infos-club">Illuminati</span>
            <span id="idea-infos-date5" class="idea-infos-date">Personne ne sait</span>
            <span id="idea-infos-price5" class="idea-infos-price">La vie</span>
            <textarea name="" id="idea-infos-description5" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In hic, perferendis quod vel, ad accusamus eaque ut facilis, sunt nulla ab. Odit, magni magnam iste deleniti alias quos minus maiores.</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin5" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img4" style="background-image: url(photos/buffalo.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="0" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title4" class="idea-infos-title">Buffalo Grill</span>
            <span id="idea-infos-place4" class="idea-infos-place">Buffalo Grill Arras</span>
            <span id="idea-infos-club4" class="idea-infos-club"></span>
            <span id="idea-infos-date4" class="idea-infos-date">14 avril</span>
            <span id="idea-infos-price4" class="idea-infos-price"> 10 à 30€</span>
            <textarea name="" id="idea-infos-description4" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, officia beatae autem quam! Nisi, doloribus. Rerum porro, assumenda vero architecto fugiat repellendus ratione obcaecati. Voluptatum asperiores modi facilis nam nostrum.</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin4" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img6" style="background-image: url(photos/barbecue.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="0" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title6" class="idea-infos-title">Barbecue</span>
            <span id="idea-infos-place6" class="idea-infos-place">Cesi</span>
            <span id="idea-infos-club6" class="idea-infos-club">Exia Miam</span>
            <span id="idea-infos-date6" class="idea-infos-date">Jour du rattrapage</span>
            <span id="idea-infos-price6" class="idea-infos-price">4€</span>
            <textarea name="" id="idea-infos-description6" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ad hic explicabo, autem adipisci ratione maiores! Mollitia similique quae eum eveniet, aliquid cum corrupti? Blanditiis sapiente soluta laboriosam, eaque ab!</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin6" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img7" style="background-image: url(photos/romain.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="0" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title7" class="idea-infos-title">Les anecdotes de tonton Romain</span>
            <span id="idea-infos-place7" class="idea-infos-place">Cesi</span>
            <span id="idea-infos-club7" class="idea-infos-club"></span>
            <span id="idea-infos-date7" class="idea-infos-date">Dans 3 ans</span>
            <span id="idea-infos-price7" class="idea-infos-price">Inestimable</span>
            <textarea name="" id="idea-infos-description7" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat necessitatibus rerum explicabo quibusdam consectetur. Sint similique placeat omnis officia incidunt itaque fugit, accusantium, provident minima eius autem, quidem eum optio.</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin7" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
    <div class="AKL-ctn--c2-t1 idea">
        <div class="AKL-ctn--c3-t1 idea-img" id="idea-img8" style="background-image: url(photos/loic.jpg)"></div>
        <div class="AKL-ctn--c2_3-t1 idea-infos">
            <a class="idea-infos-like" value="0" style="background-image: url(img/like_grey.svg)"></a>
            <span id="idea-infos-title8" class="idea-infos-title">Les secrets révelés d'un sniper</span>
            <span id="idea-infos-place8" class="idea-infos-place">Cesi</span>
            <span id="idea-infos-club8" class="idea-infos-club"></span>
            <span id="idea-infos-date8" class="idea-infos-date">Dans 3 ans</span>
            <span id="idea-infos-price8" class="idea-infos-price">De l'or en barre</span>
            <textarea name="" id="idea-infos-description8" cols="30" rows="4" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus omnis ex mollitia odio labore totam, nam consectetur ipsam excepturi molestiae tenetur odit tempora, laboriosam a voluptatem eos provident cumque debitis.</textarea>
        </div>
        <div class="AKL-ctn--c1 idea-admin8" id=""><a class="AKL-btnClassic-Flat-dark">Administrer</a></div>
    </div>
</div>
-->



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
                    <input id="check-eventDone" name="check-category" type="radio" hidden>
                    <label class="check-label">Evénements terminés</label>
                </div>

                <div class="AKL-ctn--c3 radio-blc">
                    <label for="check-eventMonth" class="AKL-radio--cross"></label>
                    <input id="check-eventMonth" name="check-category" type="radio" hidden>
                    <label class="check-label">Evénements du mois</label>
                </div>

                <div class="AKL-ctn--c3 radio-blc">
                    <label for="check-eventIdea" class="AKL-radio--cross"></label>
                    <input id="check-eventIdea" name="check-category" type="radio" hidden checked>
                    <label class="check-label">Boite à idée</label>
                </div>
            </form>
        </div>
    </div>
</div>

	<?php include '_footer.php' ?>

<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/ideaBox.min.js"></script>
<script src="js/ideaBoxValidation.js"></script>
</body>
</html>