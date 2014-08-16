<?php

//MySQL table should contain id, name, parent columns.

$db = new mysqli('localhost', 'root', '', 'test');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql ="SELECT * FROM `categories`";
$result=$db->query($sql);
while($row = $result->fetch_assoc()){
     $arr[]=$row;
}

function get_tree($arr,$id){
	$arr2 = array();
    
    foreach($arr as $key => $value){
        if($value['parent']==$id){
            $arr2[$value['id']]=$value;
            $arr2[$value['id']]['children'] = get_tree($arr,$value['id']);
        }
    }
	return $arr2;
}
function test_print($item)
{
    echo "$item\n";
}
echo "<pre>";
print_r(get_tree($arr,0));

?>
