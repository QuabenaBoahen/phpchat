<?php 

$host="localhost";
$username="root";
$password="fredbo123";
$db_name="phpchat";

$con=new mysqli($host, $username, $password, $db_name);

function formatMsgDate($date){
	return date('g:i a', strtotime($date));
}

?>