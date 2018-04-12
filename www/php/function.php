<?php

function secure($request){
	mysql_real_escape_string($request);
	htmlspecialchars($request);

	return $request;
}

?>