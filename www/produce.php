<?php session_start(); ?>


<?php

$category=null;
$min=null;
$max=null;
if(isset($_GET['category'])){$category=$_GET['category'];}
if(isset($_GET['min'])){$min=$_GET['min'];}
if(isset($_GET['max'])){$max=$_GET['max'];}
$where="";


if(isset($category) && isset($min) && isset($max))//there is a category param
{
  $where .="WHERE category.name='".$category."' AND price BETWEEN ".$min." AND ".$max;
}
else if(!isset($category) && isset($min) && isset($max)){//no category param
  $where .= "WHERE price BETWEEN ".$min." AND ".$max ;
}
else {
  $where="";
}


try{
//conexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');

} catch(PDOException $e){

    die($e->getMessage());

}
$q = $bdd->prepare("SELECT produce.id AS id , produce.name As name, produce.price As price, category.name As category, produce.description As description, produce_picture.url from (produce LEFT JOIN category ON produce.id_category=category.id) LEFT JOIN produce_picture ON produce.id=produce_picture.id_produce ".$where);
$q->execute();
$data = $q->fetchAll(PDO::FETCH_ASSOC);

$disp=json_encode($data,true);
?>

        <?=$disp ?>
