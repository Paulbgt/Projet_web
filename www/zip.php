<?php session_start();

if($_SESSION['statute'] != 3){
    header('Location: index.php'); 
}

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
