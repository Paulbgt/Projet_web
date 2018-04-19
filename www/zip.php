<!-- 
<?php 
if ($_SESSION['statute'] != 3) {
    header ('Location: index');
    exit();
?>
-->

<?php  

$id = $_GET['download_id'];

$pathdir = "event_picture/".$id."/";
$nameArchive = time().".zip";
//on lui donne un nom et on la créer avec la fonction CREATE
//we give it a name and create it with the CREATE function

if($zip ->open($nameArchive, ZipArchive::CREATE) === TRUE) {
$dir = opendir($pathdir);
while($file = readdir($dir)) {
if(is_file($pathdir.$file)) {
$zip ->addFile($pathdir.$file, $file);
//on ajoute le nom du fichier que l'on veut avoir en Zip
//we add the name of the file we want to have in Zip

}
header('Location: '.$nameArchive);
//on redirige vers le nom du zip pour que le client puisse le télécharger.
//we redirect to the name of the zip so that the client can download it.
    
$zip ->close();
//on ferme l'archive.
//we close the archive

echo "ça fonctionne";
}
else{
echo "ça ne fonctionne pas";
} 

?>
