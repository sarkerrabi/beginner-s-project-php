<?php
/**
 * Database config variables
 */
define("DB_HOST","localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "1234");
define("DB_DATABASE", "sarkertech");



$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	if($db == false){
		echo "No connection";
    }



?>
