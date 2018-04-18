<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="site_picture/exia-logo.png"/>
    <title>BDE - Boutique</title>
    <meta name="description" content="Boutique de goodies du BDE de l'Exia.Cesi d'Arras."/>
    <link rel="stylesheet" href="AKLibrary/AURELIENKLEIN.library.min.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link rel="stylesheet" href="css/shop.min.css">
</head>
<body>

	<?php include '_header.php' ?>
      
      
      <div class="wrapper">
          <h1 class="AKL-ctn--c1 banner">Boutique
              <a class="banner-cart">14</a>
          </h1>
          
<!--          .AKL-ctn--c1.promotion>h2.promotion-title+.AKL-ctn--c4-s1.article*3>(.AKL-ctn--c1.article-img>h3.article-img-title)+.AKL-ctn--c1.article-infos>span.AKL-ctn--c2.article-infos-price+span.AKL-ctn--c2.article-infos-category+p.AKL-ctn--c1.article-infos-description+input[type=submit].AKL-btnClassic-Flat-ocean.article-infos-btnAdd-->
          <div class="AKL-ctn--c1 promotion">
              <h2 class="promotion-title">Les plus populaires</h2>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Tasse exiaCorp</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">10€</span>
                      <span class="article-infos-category">Tasse</span>
                      <p class="article-infos-description">Tasse à l'éffigie de d'exiaCorp Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias placeat explicabo dolorem doloribus. aaaaaabbbbbbaaaa</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Pull année 2017-2018</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">50€</span>
                      <span class="article-infos-category">Pull</span>
                      <p class="article-infos-description">Pull de l'exia cesi année 2017-2018</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Clé USB</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">2€</span>
                      <span class="article-infos-category">Accessoire</span>
                      <p class="article-infos-description">Clé USB à l'éffigie de l'exia cesi</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
          </div>
          
          
          <div class="AKL-ctn--c1 searchNav">
              <h2 class="searchNav-title">Goodies</h2>
              <p class="searchNav-titleFilter">Appliquer un filtre</p>
              <span>Catégorie :</span>
              <select class='AKL-select-snow searchNav-select'>
                  <option></option>
                  <option>Tasse</option>
                  <option>Vêtement</option>
                  <option>Clé USB</option>
              </select>
              <span>Prix minimum :</span>
              <input type="range" class='AKL-range min-range' min="0" max="1000" value="0" step="1">
              <span>Prix maximum :</span>
              <input type="range" class='AKL-range max-range' min="0" max="1000" value="1000" step="1">
          </div>
          
          
          <div class="listArticle">
              
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Tasse exiaCorp</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">10€</span>
                      <span class="article-infos-category">Tasse</span>
                      <p class="article-infos-description">Tasse à l'éffigie de d'exiaCorp Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias placeat explicabo dolorem doloribus. aaaaaabbbbbbaaaa</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Pull année 2017-2018</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">50€</span>
                      <span class="article-infos-category">Pull</span>
                      <p class="article-infos-description">Pull de l'exia cesi année 2017-2018</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Clé USB</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">2€</span>
                      <span class="article-infos-category">Accessoire</span>
                      <p class="article-infos-description">Clé USB à l'éffigie de l'exia cesi</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Tasse exiaCorp</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">10€</span>
                      <span class="article-infos-category">Tasse</span>
                      <p class="article-infos-description">Tasse à l'éffigie de d'exiaCorp Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias placeat explicabo dolorem doloribus. aaaaaabbbbbbaaaa</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Pull année 2017-2018</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">50€</span>
                      <span class="article-infos-category">Pull</span>
                      <p class="article-infos-description">Pull de l'exia cesi année 2017-2018</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              <div class="article">
                  <div class="AKL-ctn--c1 article-img">
                      <h3 class="article-img-title">Clé USB</h3>
                  </div>
                  <div class="AKL-ctn--c1 article-infos">
                      <span class="article-infos-price">2€</span>
                      <span class="article-infos-category">Accessoire</span>
                      <p class="article-infos-description">Clé USB à l'éffigie de l'exia cesi</p>
                      <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                  </div>
              </div>
              
          </div>
          
      </div>
      
      
      
      
    <div class="backgroundModal">
        <div class="modal">
            <h2 class="modal-title">Panier</h2>
            <a class="modal-close">X</a>
            <div class="lineTitle">
                <a class="line-delete"></a>
                <span class="line-name">Nom de l'article</span>
                <span class="line-price">Prix unitaire</span>
                <span class="line-quantity">Quantité</span>
            </div>
            <div class="line">
                <a class="line-delete">X</a>
                <span class="line-name">Pull A2</span>
                <span class="line-price">35€</span>
                <span class="line-quantity">1</span>
            </div>
            <div class="line">
                <a class="line-delete">X</a>
                <span class="line-name">Clé USB</span>
                <span class="line-price">2€</span>
                <span class="line-quantity">4</span>
            </div>
            <div class="line">
                <a class="line-delete">X</a>
                <span class="line-name">Tasse</span>
                <span class="line-price">10€</span>
                <span class="line-quantity">2</span>
            </div>
            <div class="line">
                <a class="line-delete">X</a>
                <span class="line-name">Pull A1</span>
                <span class="line-price">50€</span>
                <span class="line-quantity">1</span>
            </div>
            
            <div class="lineTT">
                <span class="lineTT-ht">Prix HT :</span>
                <span class="lineTT-ht"></span>
            </div>
            <div class="lineTT">
                <span class="lineTT-tva">TVA :</span>
                <span class="lineTT-tva"></span>
            </div>
            <div class="lineTT">
                <span class="lineTT-ttc">Prix TTC :</span>
                <span class="lineTT-ttc"></span>
            </div>
            <input class="AKL-btnClassic-Flat-ocean modal-payment" type="submit" value="Valider la commande">
        </div>
    </div>
       
    <?php include '_footer.php' ?>
    
<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/shop.min.js"></script>
</body>
</html>