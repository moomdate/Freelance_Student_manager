<?php
require '../includes/config.inc.php';
$_check_all = $_POST['all'];
$_status = $_POST['ban'];
$_id_update = $_POST['id'];
if($_check_all==1){
	$data_log_ban = array('status' => 'yes');
	mysql_query("UPDATE user SET user_ban = '$_status' WHERE user_type = 0");
}else{
	$data_log_ban = array('status' => 'no');
	mysql_query("UPDATE user SET user_ban = '$_status' WHERE user_id = '$_id_update' ");
}
//$data_log_ban = array('status' => 'complete');
echo json_encode($data_log_ban);
?>