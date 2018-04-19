<div class="AKL-ctn--c1-s0 header">
    <?php
        // *[English]* If the user is logged on we will display the different tabs
        // *[Français]* Si l'utilisateur est connecté on va afficher les différents onglets
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
            <li class="nav-blc-ul-li"><a href="shop">Boutique</a></li>
            <?php 
            // *[English]* If the user is part of the BDE we will display the tab reports
            // *[Français]* Si l'utilisateur fait partit du BDE on va afficher l'onglet signalements
            if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
            <li class="nav-blc-ul-li"><a href="report">Signalements</a></li>
            <?php } ?>
            <?php 
            // *[English]* If the user is an employee we will display the administration tab
            // *[Français]* Si l'utilisateur est un salarié on va afficher l'onglet administration
            if(isset($_SESSION['statute']) && $_SESSION['statute'] == 3){ ?>
            <li class="nav-blc-ul-li"><a href="administration">Administration</a></li>
          <?php } ?>
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
        // *[English]* If the user is logged on we will display his status, his name and his first name
        // *[Français]* Si l'utilisateur est connecté on va afficher son statut, son nom et son prénom
        if(isset($_SESSION['statute'])){
    ?>
    <span class="header-log-span">Statut :</span>
    <span class="header-log-status">
        <?php  
                // *[English]* Switch case to display the status according to its status
                // *[Français]* Switch case pour afficher le statut en fonction de son statut
                switch($_SESSION['statute']) {
                    case '0' :  echo("Invité"); break;
                    case '1' :  echo("Étudiant"); break;
                    case '2' :  echo("BDE"); break;
                    case '3' :  echo("Salarié"); break;
                } 
        ?>
    </span>
    <span class="header-log-name">
        <?php 
            // *[English]* Display name and first name
            // *[Français]* Affichage du nom et du prénom
            echo($_SESSION['first_name'] . " " . $_SESSION['last_name']);
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
        // *[English]* If the user is logged on we will display the different tabs
        // *[Français]* Si l'utilisateur est connecté on va afficher les différents onglets
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
          <?php 

          if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
            <hr>
            <li class="nav-blc-ul-li"><a href="report">Signalements</a></li>
          <?php } ?>
          <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 3){ ?>
            <hr>
            <li class="nav-blc-ul-li"><a href="administration">Administration</a></li>
          <?php } ?>
        </ul>
        <hr>
        <span class="headerPhone-log-name">
        <?php 
            echo($_SESSION['first_name'] . " " . $_SESSION['last_name']);
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