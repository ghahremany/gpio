<?php 


define("version","Version 0.1.0"); 

##############################
define('DB_HOST', 'localhost');
define('DB_NAME', 'raspberry');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'raspberry');
##############################

function connect_to_DB(){
	$Connect = mysql_connect(DB_HOST , DB_USERNAME, DB_PASSWORD);
	mysql_select_db(DB_NAME, $Connect);
	
	
}
?>