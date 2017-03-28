<?php 
require '../includes/config.inc.php';
  $post_data_resi=$_POST['id_data'];
  $ajax_reslut = mysql_query("SELECT * FROM class WHERE c_id = '$post_data_resi' ");          
  $array_for_e = mysql_fetch_array($ajax_reslut);    
  //"$array_for_e['c_name'] 
  echo json_encode($array_for_e);
?>
