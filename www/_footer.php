<div class="AKL-ctn--c1 footer">
    
    <span class="footer-akl">Site développé avec <a href="https://aklibrary.fr">AKLibrary</a></span>
    <div class="footer-twitter">
    <a href="https://twitter.com/eXiaCesiArras?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-lang="fr" data-show-count="false">Follow @eXiaCesiArras</a>
    </div>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <?php
        if(isset($_SESSION['statute'])){
    ?>
    <ul class="footer-ul">
        <li class="footer-ul-li"><a href="ideaBox">Boite à idée</a></li>
        <li class="footer-ul-li"><a href="eventMonth">Evénements du mois</a></li>
        <li class="footer-ul-li"><a href="eventDone">Evénements passés</a></li>
        <li class="footer-ul-li"><a>Boutique</a></li>
    </ul>
    <?php } ?>
</div>