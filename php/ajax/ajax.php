<?php 
$action = $_GET['action'];	
if($action)
	include("ajax/{$action}.php");
?>