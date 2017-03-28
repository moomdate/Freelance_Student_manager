<?php
require '../includes/config.inc.php';
if(move_uploaded_file($_FILES["image"]["tmp_name"], "../Files/".$_FILES["image"]["name"])){
			echo (json_encode($_FILES));
}
//mysql_query("INSERT INTO `lesson` (`les_name`, `les_date_up`, `les_file`, `les_f_size`, `les_update`, `les_detail`, `c_id`) VALUES ('$data['name']', '$datetime', '2', '3', '2016-05-20 00:00:00', '4', '5');");
?>