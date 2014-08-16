<?php
include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";

$db_user = "root";
$db_password = "";
$db_name = "veri";
$db_host = "localhost";

$db = new ezSQL_mysqli('db_user', 'db_password', 'db_name', 'db_host');

$current_time = $db->get_var("SELECT " . $db->sysdate());
print "ezSQL demo for mySQL database run @ $current_time";

$db->debug();

?>
