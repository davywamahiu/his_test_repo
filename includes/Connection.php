<?php

	include_once dirname(__FILE__).'/Constants.php';

	$con = mysqli_connect(SERVER, USER, PASS, DB);

	if (!$con) {
		echo "Error Connectiong to server";
	}


?>
