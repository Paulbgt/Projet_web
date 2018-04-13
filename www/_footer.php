<div class="AKL-ctn--c1 footer">
    
    <span class="footer-akl">Site développé avec <a href="https://aklibrary.fr">AKLibrary</a></span>
    <img class="footer-twitter" src="img/twitter.png" alt="twitter">
    <?php
        if(isset($_SESSION['statute'])){
    ?>
    <ul class="footer-ul">
        <li class="footer-ul-li"><a href="ideaBox">Boite à idée</a></li>
        <li class="footer-ul-li"><a href="eventMonth">Evénements du mois</a></li>
        <li class="footer-ul-li"><a>Evénements passés</a></li>
        <li class="footer-ul-li"><a>Boutique</a></li>
    </ul>
    <?php
		}
	?>
</div>