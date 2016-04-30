<?php
$con = mysqli_connect("localhost", "root", "", "database");

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM data");

$array = array();
while($row = mysqli_fetch_array($result)) {
	$array[] = $row['name'];
}
//print_r($array);
mysqli_close($con);
?>
