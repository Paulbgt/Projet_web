<?php
include "php/BDD.php";



Class API
{
	//initialize the request
	function __construct()
	{
		$this->reqArgs();

	}

	// provides the response
	function reqArgs()
	{
		// get the HTTP method, path and body of the request
		$method = $_SERVER['REQUEST_METHOD'];
		$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
		$input = json_decode(file_get_contents('php://input'),true);

		// retrieve the table and key from the path
		$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
		$key = array_shift($request)+0;


		if ($input)
		{

			// escape the columns and values from the input object
			$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
			$values = array_values($input);


			// build the SET part of the SQL command
			$set = '';
			for ($i=0;$i<count($columns);$i++)
			{
			  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
			  $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');

			}

		}


		$bdd = new BDD();
		if (!$method){$method ="GET";}
		switch ($method) {
  			case 'GET':
		    $bdd->getAction($key); break;
			case 'PUT':
		    //$bdd->putAction($table, $key, $set); break;
			case 'POST':
		    //$bdd->postAction($table, $set); break;
			case 'DELETE':
		    //$bdd->deleteAction($table, $key); break;
		}
	}
}

new API();

?>
