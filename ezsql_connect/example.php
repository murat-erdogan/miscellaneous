<?php
include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";

$db_user = "root";
$db_password = "";
$db_name = "database";
$db_host = "localhost";

$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);

$current_time = $db->get_var("SELECT " . $db->sysdate());
echo $current_time;

$db->debug();

?>
