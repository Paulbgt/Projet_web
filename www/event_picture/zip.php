<?php  

		$zip = new ZipArchive; //on créer un nouveau fichier archive zipp
		$zip->open("camarche.zip", ZipArchive::CREATE); //on lui donne un nom et on la créer avec la fonction CREATE

		$rep=scandir('35'); //on liste les fichiers et dossiers dans le dossier selectionner

		unset($rep[0], $rep[1], $rep[200]); //permet de prendre jusqu'a 200 photos dans le dossier

		foreach ($rep as $file) {
			$zip->addfile("35/{$file}");//on ajoute le nom du fichier que l'on veut avoir en Zip
		}

		header('Location:camarche.zip');//on redirige vers le nom du zip pour que le client puisse le télécharger.

		$zip->close();//on ferme l'archive.

?>