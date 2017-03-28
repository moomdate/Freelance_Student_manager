<?php
require '../includes/config.inc.php';
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$encoded1 = base64_encode($password);
$encoded_password = str_rot13($encoded1);
$check_num=mysql_num_rows(mysql_query("SELECT * FROM `user` WHERE `user_uname` = '$username'"));//mysql_num_rows
if($check_num>0){
	$data_log = array('name' => $username, 'status' => 'error');
	echo json_encode($data_log);
}else{
	$data_log = array('name' => $username, 'status' => 'complete');
	mysql_query("INSERT INTO `user` (`user_uname`, `user_name`, `user_pass`) VALUES ('$username', '$name', '$encoded_password');");
	echo json_encode($data_log);
}

?>

