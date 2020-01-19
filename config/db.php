<?php
error_reporting(0);
require_once 'constant.php';
require_once 'commonVariables.php';

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn->connect_error)
{
	die('Database : ' .$conn->connect_error);
}

?>
