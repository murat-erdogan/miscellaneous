<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include_once "../inc/ez_sql_core.php";
	include_once "../inc/ez_sql_sqlite3.php";

	$db = new ezSQL_sqlite3('./','test.db');        
	$my_tables = $db->get_results("SELECT * FROM t1");
	$db->debug();
?>
