<?php 
$server_name = "localhost";
$user_name = "amitcmq8_root";
$password = "amitcmq8_root";
$db = "amitcmq8_sonal";
$con = mysql_connect("$server_name", "$user_name", "$password");
mysql_select_db($db, $con);
if (!$con) {
	echo "try it again";
}

 ?>