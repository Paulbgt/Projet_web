<?php session_start();  ?>
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
    <link rel="stylesheet" href="css/ideaBox.min.css">
</head>
<body>

	<?php include '_header.php' ?>

<!--.wrapper>.AKL-ctn--c1.banner+(.AKL-ctn--c1.displaySuggestion>.AKL-ctn--c2-s3_4.suggestion>span.suggestion-title+(.AKL-ctn--c2-s1.suggestion-img>label.AKL-btnClassic-Flat-ocean+input#fileImg.AKL-btnFile)+.AKL-ctn--c2-s1.suggestion-infos>input.suggestion-infos-title+input.suggestion-infos-date+input.suggestion-infos-place+input.suggestion-infos-club+input.suggestion-infos-price+input.suggestion-infos-description+.AKL-btnClassic-Flat-ocean)+.AKL-ctn--c2-s1.idea*8>.AKL-ctn--c2-s1.idea-img$+.AKL-ctn--c2-s1.idea-infos>span#idea-infos-title$.idea-infos-title+span#idea-infos-date$.idea-infos-date+span#idea-infos-place$.idea-infos-place+span#idea-infos-club$.idea-infos-club+span#idea-infos-price$.idea-infos-price+textarea#idea-infos-description$.idea-infos-description-->

<div class="wrapper">
    <h1 class="AKL-ctn--c1 banner">Boite à idée</h1>
    <div class="AKL-ctn--c1 displaySuggestion">
        <div class="AKL-ctn--c3_4 suggestion">
            <span class="suggestion-title">Proposer une idée</span>
            















            <form action="php/suggest_event_add.php" method="POST">
                <div class="AKL-ctn--c2-s1 suggestion-img">
                    <label for="fileImg" class="AKL-btnModern-Shine">Choisir une image</label>
                    <input type="file" id="fileImg" class="AKL-btnFile" hidden>
                </div>
                <div class="AKL-ctn--c2-s1 suggestion-infos">
                    <input type="text" name="title" id="title" placeholder="Titre de l'idée" class="AKL-inputUnderlined suggestion-infos-title">
                    <input type="date" name="event_date" id="event_date" placeholder="Date" class="AKL-inputUnderlined suggestion-infos-date">
                    <input type="text" placeholder="Lieu" class="AKL-inputUnderlined suggestion-infos-place">
                    <input type="text" placeholder="Club" class="AKL-inputUnderlined suggestion-infos-club">
                    <input type="text" placeholder="Prix" class="AKL-inputUnderlined suggestion-infos-price">
                    <textarea placeholder="Description" name="description" id="description" cols="30" rows="4" class="AKL-textareaUnderlined-locked suggestion-infos-description"></textarea>
                    <input type="submit" name="validation date_event" class="AKL-btnClassic-Flat suggestion-infos-submit"/>
                </div>
            </form>
            
        </div>
    </div>



















    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img1" style="background-image: url(photos/popcorn.jpg)"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title1" class="idea-infos-title">Vente de pop corn</span>
            <span id="idea-infos-date1" class="idea-infos-date">Jamais</span>
            <span id="idea-infos-place1" class="idea-infos-place">Chez moi</span>
            <span id="idea-infos-club1" class="idea-infos-club">exia-miam</span>
            <span id="idea-infos-price1" class="idea-infos-price">-8€</span>
            <textarea name="" id="idea-infos-description1" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly>Exia-miam organise une vente de pop-corn qui ne nous a quasiment </textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img2" style="background-image: url(photos/foot.jpg)"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title2" class="idea-infos-title"></span>
            <span id="idea-infos-date2" class="idea-infos-date"></span>
            <span id="idea-infos-place2" class="idea-infos-place"></span>
            <span id="idea-infos-club2" class="idea-infos-club"></span>
            <span id="idea-infos-price2" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description2" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img3"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title3" class="idea-infos-title"></span>
            <span id="idea-infos-date3" class="idea-infos-date"></span>
            <span id="idea-infos-place3" class="idea-infos-place"></span>
            <span id="idea-infos-club3" class="idea-infos-club"></span>
            <span id="idea-infos-price3" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description3" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img4"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title4" class="idea-infos-title"></span>
            <span id="idea-infos-date4" class="idea-infos-date"></span>
            <span id="idea-infos-place4" class="idea-infos-place"></span>
            <span id="idea-infos-club4" class="idea-infos-club"></span>
            <span id="idea-infos-price4" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description4" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img5"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title5" class="idea-infos-title"></span>
            <span id="idea-infos-date5" class="idea-infos-date"></span>
            <span id="idea-infos-place5" class="idea-infos-place"></span>
            <span id="idea-infos-club5" class="idea-infos-club"></span>
            <span id="idea-infos-price5" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description5" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img6"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title6" class="idea-infos-title"></span>
            <span id="idea-infos-date6" class="idea-infos-date"></span>
            <span id="idea-infos-place6" class="idea-infos-place"></span>
            <span id="idea-infos-club6" class="idea-infos-club"></span>
            <span id="idea-infos-price6" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description6" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img7"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title7" class="idea-infos-title"></span>
            <span id="idea-infos-date7" class="idea-infos-date"></span>
            <span id="idea-infos-place7" class="idea-infos-place"></span>
            <span id="idea-infos-club7" class="idea-infos-club"></span>
            <span id="idea-infos-price7" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description7" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
    <div class="AKL-ctn--c2-s1 idea">
        <div class="AKL-ctn--c2-s1 idea-img8"></div>
        <div class="AKL-ctn--c2-s1 idea-infos">
            <span id="idea-infos-title8" class="idea-infos-title"></span>
            <span id="idea-infos-date8" class="idea-infos-date"></span>
            <span id="idea-infos-place8" class="idea-infos-place"></span>
            <span id="idea-infos-club8" class="idea-infos-club"></span>
            <span id="idea-infos-price8" class="idea-infos-price"></span>
            <textarea name="" id="idea-infos-description8" cols="30" rows="10" class="AKL-textareaUnderlined-locked idea-infos-description" readonly></textarea>
        </div>
    </div>
</div>

	<?php include '_footer.php' ?>

<script src="https://aklibrary.fr/AKLibrary/1.4.0/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/ideaBox.min.js"></script>
</body>
</html>