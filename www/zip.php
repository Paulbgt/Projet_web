<?php session_start();

if($_SESSION['statute'] != 3){
    header('Location: index.php'); 
} 

// *[English]*This function allows you to download the images of an event as a Zip file, the CREATE function create the file and CLOSE closes the zip.

// *[Français]* Cette fonction permet de télécharger un les images d'un événement en fichier Zip, la fonction CREATE créer le fichier et CLOSE ferme le zip.

if($_SESSION['statute'] = 3) {
$id = $_GET['download_id'];

$pathdir = "event_picture/".$id."/";
$nameArchive = time().".zip";

		$zip = new ZipArchive; 

if($zip ->open($nameArchive, ZipArchive::CREATE) === TRUE) {
	
	$dir = opendir($pathdir);



	while($file = readdir($dir)) {
		if(is_file($pathdir.$file)) {
			$zip ->addFile($pathdir.$file, $file);

		}
	}
	header('Location: '.$nameArchive);
	$zip ->close();

	echo "ça fonctionne";
}
else{
	echo "ça ne fonctionne pas";
}

}

?>
