<div class="AKL-ctn--c1-s0 header">
    <?php
        if(isset($_SESSION['statute'])){
    ?>
    <div class="nav-btn">
        <svg id="nav-btn-svg" width="40" height="30">
          <rect x="0" y="0" width="60" height="4"/>
          <rect x="0" y="13" width="60" height="4"/>
          <rect x="0" y="26" width="60" height="4"/>
        </svg>
    </div>
    <div class="nav-blc">
        <ul class="nav-blc-ul">
            <li class="nav-blc-ul-li"><a href="ideaBox">Boite à idée</a></li>
            <li class="nav-blc-ul-li"><a href="eventMonth">Evénements du mois</a></li>
            <li class="nav-blc-ul-li"><a href="eventDone">Evénements passés</a></li>
            <li class="nav-blc-ul-li"><a href="market.php">Boutique</a></li>
        </ul>
    </div>
    <?php
        }
    ?>

    
    <div class="header-logo">
        <img src="site_picture/exia-logo.png" alt="Logo Exia Cesi" class="header-logo-img">
    </div>
    <span class="header-spanExia">Exia.Cesi Arras</span>
    <span class="header-title">Site du BDE</span>
    
    <?php
        if(isset($_SESSION['statute'])){
    ?>
    <span class="header-log-span">Statut :</span>
    <span class="header-log-status">
        <?php  
            if ($_SESSION['mail'] == "aurelien.klein@viacesi.fr") {
                echo("Root");
            } else {
                switch($_SESSION['statute']) {
                    case '0' :  echo("Invité"); break;
                    case '1' :  echo("Étudiant"); break;
                    case '2' :  echo("BDE"); break;
                    case '3' :  echo("Salarié"); break;
                }
            }   
        ?>
    </span>
    <span class="header-log-name">
        <?php 
            echo($_SESSION['last_name'] . " " . $_SESSION['first_name']);
        ?>
    </span>
    <a href="php/logout.php">
        <img class="header-logout" src="site_picture/logout2.svg" alt="Déconnexion">
        <img class="header-logout" src="site_picture/logout1.svg" alt="Déconnexion">
    </a>
    <?php
        }
    ?>
</div>


<div class="AKL-ctn--c0-s1 headerPhone">
    <span class="headerPhone-title">Site du BDE</span>
    <span class="headerPhone-spanExia">Exia.Cesi Arras</span>

    <?php
        if(isset($_SESSION['statute'])){
    ?>
    <div class="navPhone-btn">
        <svg id="navPhone-btn-svg" width="40" height="30">
          <rect x="0" y="0" width="60" height="4"/>
          <rect x="0" y="13" width="60" height="4"/>
          <rect x="0" y="26" width="60" height="4"/>
        </svg>
    </div>
    <div class="navPhone-blc">
        <ul class="nav-blc-ul">
            <li class="nav-blc-ul-li"><a href="ideaBox">Boite à idée</a></li>
            <li class="nav-blc-ul-li"><a href="eventMonth">Evénements du mois</a></li>
            <li class="nav-blc-ul-li"><a href="eventDone">Evénements passés</a></li>
            <li class="nav-blc-ul-li"><a href="shop">Boutique</a></li>
        </ul>
        <hr>
        <span class="headerPhone-log-name">
        <?php 
            echo($_SESSION['last_name'] . " " . $_SESSION['first_name']);

        ?>
        </span>
        <span class="headerPhone-log-span">Statut : 
        <?php 
            if ($_SESSION['mail'] == "aurelien.klein@viacesi.fr") {
                echo("Root");
            } else {
                switch($_SESSION['statute']) {
                    case '0' :  echo("Invité"); break;
                    case '1' :  echo("Étudiant"); break;
                    case '2' :  echo("BDE"); break;
                    case '3' :  echo("Salarié"); break;
                }
            }
        ?>    
        </span>
        
        <a href="php/logout.php">
            <img class="headerPhone-logout" src="site_picture/logout2.svg" alt="Déconnexion">
            <img class="headerPhone-logout" src="site_picture/logout1.svg" alt="Déconnexion">
        </a>
    </div>
    <?php
        }
    ?>
    
    
</div>