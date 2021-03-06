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
              <a class="banner-cart"></a>
          </h1>

<!--        .AKL-ctn--c1.promotion>h2.promotion-title+.AKL-ctn--c4-s1.article*3>(.AKL-ctn--c1.article-img>h3.article-img-title)+.AKL-ctn--c1.article-infos>span.AKL-ctn--c2.article-infos-price+span.AKL-ctn--c2.article-infos-category+p.AKL-ctn--c1.article-infos-description+input[type=submit].AKL-btnClassic-Flat-ocean.article-infos-btnAdd-->
          <div class="AKL-ctn--c1 promotion">
              <h2 class="promotion-title">Les plus populaires</h2>
              <?php

              try{
              $bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

              } catch(PDOException $e){

                  die($e->getMessage());

              }
              $q = $bdd->prepare("SELECT count(order_composite.qantity) AS nb_sale, produce.id AS id , produce.name As name, produce.price As price, category.name As category, produce.description As description, produce_picture.url As url  from ((produce LEFT JOIN category ON produce.id_category=category.id) LEFT JOIN produce_picture ON produce.id=produce_picture.id_produce ) LEFT JOIN order_composite ON produce.id=order_composite.id_produce GROUP BY order_composite.id_produce ORDER BY nb_sale DESC LIMIT 3");
              $q->execute();

              while($data = $q->fetch())
              {
                ?>
                <form  action="php/add_article_caddy" method="POST">
                <div class="article">
                    <div class="AKL-ctn--c1 article-img" style="background_image:url(produce_picture/<?=$data['name'] ?>)">
                        <h3 class="article-img-title"><?=$data['name'] ?></h3>
                    </div>
                    <div class="AKL-ctn--c1 article-infos">
                        <span class="article-infos-price"><?=$data['price'] ?></span>
                        <span class="article-infos-category"><?=$data['category'] ?></span>
                        <p class="article-infos-description"><?=$data['description'] ?></p>
                        <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
                        <input type="hidden" name="take_id_produce" value="<?=$data['id'] ?>" readonly>
                    </div>
                </div>
                </form>
                <?php
              }
              ?>

          </div>
          <div class="AKL-ctn--c1 searchNav">
              <h2 class="searchNav-title">Goodies</h2>
              <div class="searchNav-leftSide">
                  <p class="searchNav-titleFilter">Appliquer un filtre</p>
                  <span>Catégorie :</span>
                  <select class='AKL-select-snow searchNav-select'>
                  <option value=""></option>
<?php
try
{
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

    }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query( 'SELECT id, name FROM category' ) or die(print_r($bdd->errorInfo()));;

while ($donnees = $reponse->fetch())
{
    echo '<option value="' . $donnees['name'] . '">' . $donnees['name'] . '</option>';
}

$reponse->closeCursor();


 ?>
                  </select>
                  <span>Prix minimum :</span>
                  <input type="range" class='AKL-range min-range' min="0" max="150" value="0" step="1">
                  <span>Prix maximum :</span>
                  <input type="range" class='AKL-range max-range' min="0" max="150" value="150" step="1">
                  <a class="AKL-btnClassic-Flat-ocean btnSearch">Chercher</a>
              </div>

              <?php if(isset($_SESSION['statute']) && $_SESSION['statute'] == 2){ ?>
          <form action="php/add_category_bdd.php" method="POST">
              <div class="searchNav-rightSide">
                  <div class="addCategory">
                      <p class="addCategory-title">Ajouter une catégorie</p>
                      <div class="addCategory-blc">
                          <input type="text" class="AKL-inputUnderlined" name="name_category" placeholder="Nom">
                          <input type="submit" class="AKL-btnClassic-Flat addArticle-submit" value="Ajouter">
                      </div>
                  </div>
          </form>

<form action="php/add_article_bdd.php" method="POST" enctype="multipart/form-data">
                  <div class="addArticle">
                      <p class="addArticle-title">Ajouter un article</p>
                      <div class="addArticle-blc">
                          <input type="text" class="AKL-inputUnderlined" placeholder="Nom" name="name_article">
                          <input type="text" class="AKL-inputUnderlined" placeholder="Prix" name="price_article">
                          <textarea class="AKL-textareaUnderlined-locked" rows="4" cols="30" placeholder="Description" name="description_article"></textarea>
                          <label for="file1" class="AKL-btnClassic-FlatBorder">Image</label>
                          <input hidden type="file" id="file1" name="image" class="AKL-btnFile">
                          <select class='AKL-select-snow searchNav-select' name="category_article">
                              <option value="">Catégorie :</option>
<?php
try {
    $bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query( 'SELECT id, name FROM category' ) or die(print_r($bdd->errorInfo()));;

while ($donnees = $reponse->fetch()) {
    echo '<option value="' . $donnees['id'] . '">' . $donnees['name'] . '</option>';
}
$reponse->closeCursor();
?>
                          </select>
                          <input type="submit" class="AKL-btnClassic-Flat addArticle-submit" value="Ajouter">
                      </div>
                  </div>
              </div>
              <?php } ?>
          </div>
</form>

          <div class="listArticle">
 <?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}
//requête qui permet de récupérer les données dans la BDD
$display = $bdd->prepare("SELECT produce.id AS id_produce, produce.name AS name_produce, produce.description AS description_produce, produce.price AS price_produce, produce.id_category, category.name AS name_category FROM produce LEFT JOIN category ON produce.id_category=category.id");
$display->execute();
//afficher chaque entrée une à une
while ($response = $display->fetch()) {
?>

<form action="php/add_article_caddy.php" method="POST">
      <div class="article">
          <div class="AKL-ctn--c1 article-img">
              <h3 name="shop-info-name" class="article-img-title"><?= $response['name_produce'] ?></h3>
          </div>
          <div class="AKL-ctn--c1 article-infos">
              <span name="shop-info-price" class="article-infos-price"><?= $response['price_produce'] ?></span>
              <span class="article-infos-category"><?= $response['name_category'] ?></span>
              <p name="shop-info-description" class="article-infos-description"><?= $response['description_produce'] ?></p>

              <input type="hidden" name="take_id_produce" value="<?= $response['id_produce']?>" readonly>

              <input type="submit" class="AKL-btnModern-Shine-ocean article-infos-btnAdd" value="+">
          </div>
      </div>
</form>

<?php
}
$display->closeCursor();

?>

<!--


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
             -->
           </div>
  </div>


    <?php include '_footer.php' ?>

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

<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}

$idorder = $_SESSION['id_order'];

$see = $bdd->prepare("SELECT * FROM (orders LEFT JOIN order_composite ON orders.id=order_composite.id_orders)LEFT JOIN produce ON produce.id=order_composite.id_produce WHERE orders.id=:idorder AND orders.statute = 'panier'");

$see->execute([
    ':idorder' => $idorder
]);


while ($response = $see->fetch()) {
?>

            <div class="line">
                <a href="php/delete_article_caddy.php?idproduce=<?= $response['id_produce']?>" class="line-delete">X</a>
                <span class="line-name"><?= $response['name'] ?></span>
                <span class="line-price"><?= $response['price'] ?> €</span>
                <span class="line-quantity"><?= $response['qantity']?></span>
            </div>

<?php
}
$see->closeCursor();
?>


<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}

$idorder = $_SESSION['id_order'];

$saw = $bdd->prepare("SELECT *, SUM(price) AS sum_price FROM (orders LEFT JOIN order_composite ON orders.id=order_composite.id_orders)LEFT JOIN produce ON produce.id=order_composite.id_produce WHERE orders.id=:idorder AND orders.statute = 'panier'");

$saw->execute([
    ':idorder' => $idorder
]);


while ($responses = $saw->fetch()) {

?>


            <div class="lineTT">
                <span class="lineTT-ht">Prix HT :</span>
                <span class="lineTT-ht"><?= $responses['sum_price'] ?> €</span>
            </div>
<?php
}
$saw->closeCursor();
?>
            <div class="lineTT">
                <span class="lineTT-tva">TVA :</span>
                <span class="lineTT-tva">20 %</span>
            </div>


<?php
try{
//conexion à la base de données
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

} catch(PDOException $e){

    die($e->getMessage());
}

$idorder = $_SESSION['id_order'];

$saww = $bdd->prepare("SELECT *, SUM(price)*1.20 AS sum_price_tva FROM (orders LEFT JOIN order_composite ON orders.id=order_composite.id_orders)LEFT JOIN produce ON produce.id=order_composite.id_produce WHERE orders.id=:idorder AND orders.statute = 'panier'");

$saww->execute([
    ':idorder' => $idorder
]);


while ($responsess = $saww->fetch()) {

?>

            <div class="lineTT">
                <span class="lineTT-ttc">Prix TTC :</span>
                <span class="lineTT-ttc"><?= $responsess['sum_price_tva'] ?> €</span>
            </div>

<?php
}
$saww->closeCursor();
?>
            <input class="AKL-btnClassic-Flat-ocean modal-payment" type="submit" value="Valider la commande">
        </div>
    </div>


<script src="AKLibrary/AURELIENKLEIN.library.min.js"></script>
<script defer src="js/common.min.js"></script>
<script src="js/shop.min.js"></script>
<script src="js/loadProduce.js"></script>
</body>
</html>
