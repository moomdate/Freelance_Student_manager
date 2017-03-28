<?php
require '../includes/config.inc.php';
$gate_data=$_POST['command'];

$mysql_File_name_ = mysql_query("SELECT * FROM lesson WHERE les_id = '$gate_data'");
/*$data_query = mysql_fetch_array($mysql_File_name_);
$data2 = mysql_num_rows(mysql_query("SELECT * FROM lesson WHERE les_file = $data_query['les_file']"));
if($data2==1){
	@unlink('../Files/'.$mysql_File_name['les_file']);
}else{
	
}*/
mysql_query("DELETE FROM lesson WHERE les_id = '$gate_data'");

?>