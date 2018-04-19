<?php
Require_once 'config.php';
Class BDD
{
	//PDO connection is reached from the singleton class
	//get the selected row
	public Function getAction($key)
	{
		try {
            if($key) {$rq = singleton::getInstance()->prepare("select * from produce WHERE `category` =".$key);}
			else {$rq = singleton::getInstance()->prepare("select * from produce");}
			$rq->execute();
			if (!$key) echo '[';
			for ($i=0;$i<$rq->rowCount();$i++) {echo ($i>0?',':'').json_encode($rq->fetchObject());}
  			if (!$key) echo ']';
		}
		catch (PDOException $e)
		{echo $e->getMessage();
				exit;
			}
	}
	//update selected table
	public Function putAction($table, $key, $set)
	{
		try {
			$rq = singleton::getInstance()->prepare("update `".$table."` set ".$set." where id=".$key);
			$rq->execute();
			echo "Modification apliquée pour l'id ".$key." de la table".$table;
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}
	}
	//insert a row from selected table
	public Function postAction($table, $set)
	{
		try{
			$rq = singleton::getInstance()->prepare("insert into `".$table."` set ".$set);
			$rq->execute();
			echo "insertion OK dans la table".$table;
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}
	}
	//delete a row from selected table
	public Function deleteAction($table, $key)
	{
		try{
			$rq = singleton::getInstance()->prepare("delete FROM `".$table."` where id=".$key);
			$rq->execute();
			echo "Suppression OK dans la table ".$table." et sur la valeur ".$key;
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}
	}
}
?>
