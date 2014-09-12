<?php
	header('Content-Type: application/json');
	
	include_once "inc/ez_sql_core.php";
	include_once "inc/ez_sql_mysqli.php";

	$db_user = "root";
	$db_password = "";
	$db_name = "test";
	$db_host = "localhost";
	$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
	$db->query("SET NAMES 'utf8'");
	
	if ($_POST) {
		$post_data = json_decode($_POST['data']);
		$username = $db->escape($post_data->username);
		$password = $db->escape($post_data->password);
		$function = $post_data->function->name;
		
		$auth = $db->get_var("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
		
		if ($auth <> 0) {
			if ($function == 'get_table') {
				$data->success = 1;
				$data->data = $db->get_results("SELECT * FROM test1");
				echo json_encode($data);
			}else if ($function == 'get_table2') {
				$data->success = 1;
				$data->data = $db->get_results("SELECT * FROM test2");
				echo json_encode($data);
			}
		}else {
			$data->success = 0;
			$data->error = 'authentication error';
			echo json_encode($data);
		}
	}
?>
