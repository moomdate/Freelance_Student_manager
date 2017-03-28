<?php
require '../includes/config.inc.php';
$gate_data=$_POST['choices'];
$datetime_update = date('Y-m-d H:i:s');
mysql_query("UPDATE class SET `c_name` = '$gate_data[1]', `c_detail` = '$gate_data[2]',c_date='$datetime_update' WHERE `c_id` = '$gate_data[0]';");
?>