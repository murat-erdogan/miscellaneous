<?php
	$post_array['username'] = $_POST['username'];
	$post_array['password'] = $_POST['password'];
	$post_array['function'] = $_POST['function'];
	
	foreach($post_array as $field => $value) {
		$elements[] = $field . '=' . $value;
	}
	$post_data = join('&', $elements);
   
	$url = "http://localhost/webservice/index.php";
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
	$data = curl_exec($curl);
	curl_close($curl);
	echo $data;
?>
<br><br>
<form action="" method="POST">
	Username: <input type="text" name="username"><br>
	Password: <input type="text" name="password"><br>
	Function: <input type="text" name="function"><br>
	<input type="submit" value="Submit">
</form>
