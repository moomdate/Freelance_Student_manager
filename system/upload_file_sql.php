<?php
require '../includes/config.inc.php';
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$file_name = $_POST['file_name'];
	$file_size = $_POST['size'];
	$id = $_POST['id'];
	$detail = $_POST['detail'];
}
$datetime = date('Y-m-d H:i:s');
$sql=mysql_query("INSERT INTO `lesson` (`les_name`, `les_date_up`, `les_file`, `les_f_size`, `les_update`, `les_detail`, `c_id`) VALUES ('$name', '$datetime', '$file_name', '$file_size', '$datetime', '$detail', '$id');");
if($sql){
	echo json_encode($sql);
}