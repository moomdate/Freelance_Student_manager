<?php
$host="localhost";
$user="root";
$pass="";
$db_like="management";
$conn=mysql_connect($host,$user,$pass);
if ($conn)
{
mysql_select_db($db_like);
mysql_query("SET NAMES UTF8");
date_default_timezone_set("Asia/Bangkok");

}
else
{
	echo "<center>Check connection_database</center>";
}

?>