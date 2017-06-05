<?php
	

	$name = $_GET["name"];
	$surrname = $_GET["surrname"];
	$email = $_GET["email"];
	$password = $_GET["password"];

	$userlist = fopen("userlist.txt", "w");


	foreach($userlist as $line) {
	   echo $line. "\n";
	}

	//fwrite($userlist, $name."|".$surrname."|".$email."|".$password);


	die();


?>