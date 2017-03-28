<?php
require '../includes/config.inc.php';
$class_name = $_POST['Class_name'];
$datetime_update = date('Y-m-d H:i:s');
mysql_query("INSERT INTO `class` (`c_id`, `c_name`, `c_date`, `c_detail`) VALUES (NULL, '$class_name', '$datetime_update', ' ');");
?>

