<?php
require '../includes/config.inc.php';
$gate_data=$_POST['command'];
mysql_query("DELETE FROM class WHERE c_id = '$gate_data'");
mysql_query("DELETE FROM lesson WHERE c_id = '$gate_data'");
?>