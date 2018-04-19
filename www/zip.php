<?php  
//$id = $_GET['download_id'];

		$zip = new ZipArchive; 
		//on créer un nouveau fichier archive zip
		//we create a new zip archive file
		$zip->open("camarche.zip", ZipArchive::CREATE); 
		//on lui donne un nom et on la créer avec la fonction CREATE
		//we give it a name and create it with the CREATE function

		$rep=scandir('event_picture'); 
		//on liste les fichiers et dossiers dans le dossier selectionner
		//we list the files and folders in the select folder

		print_r($rep);

		unset($rep[0], $rep[1], $rep[2000]); 
		//permet de prendre jusqu'a 2000 photos dans le dossier
		//take up to 200 photos in the folder

		foreach ($rep as $file) {
		chmod("event_picture", 0777);

		$zip->addfile("event_picture/{$file}");
		//on ajoute le nom du fichier que l'on veut avoir en Zip
		//we add the name of the file we want to have in Zip
		}

		//header('Location:camarche.zip');
		//on redirige vers le nom du zip pour que le client puisse le télécharger.
		//we redirect to the name of the zip so that the client can download it.

		$zip->close();
		//on ferme l'archive.
		//we close the archive

?>
