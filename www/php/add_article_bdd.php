<?php
try
{
$bdd = new PDO('mysql:host=mysql-zeik.alwaysdata.net;dbname=zeik_web_project;charset=utf8', 'zeik_root', 'toor');

    }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$name_article = $_POST['name_article'];
$description_article = $_POST['description_article'];
$price_article = $_POST['price_article'];
$category_article = $_POST['category_article'];

$insert = $bdd->prepare("INSERT INTO produce(name, description, price, id_category) VALUES(:name_article, :description_article, :price_article, :id_category)");
$insert->execute([
    ':name_article' => $name_article,
    ':description_article' => $description_article,
    ':price_article' => $price_article,
    ':id_category' => $category_article
]);

$insert->closeCursor();
$results = $bdd->prepare("SELECT id FROM produce WHERE name = :name AND description = :description AND price = :price AND id_category = :id_category");
$results->execute([
    ':name' => $name_article,
    ':description' => $description_article,
    ':price' => $price_article,
    ':id_category' => $category_article
				]);

while($result = $results->fetch()) {
if(isset($_FILES['image'])) {

  $image = str_replace(" ","",$_FILES['image']['name']);
  $image = str_replace("#","_",$image);
  $path = "../shop_picture/".basename($image);
  $request = $bdd->prepare("INSERT INTO produce_picture (url, id_produce) VALUES(:url, :id_produce)");
  $request->execute([
      'url' => $image,
      'id_produce' => $result['id']
      ]);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      $msg = "Image uploaded successfully";
      echo($msg);
    }else{
      $msg = "Failed to upload image";
      echo($msg);
    }
  }
}

header('Location: ../shop');
?>
