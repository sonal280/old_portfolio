<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "amitcmq8_root";
$password = "amitcmq8_root";
$db = "amitcmq8_sonal_mag";
$con = mysql_connect("$servername", "$username", "$password");
mysql_select_db($db, $con);
if (!$con) {
	echo "successful";
}

 ?>