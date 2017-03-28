<?php
$username = $_POST['username_log'];
$password = $_POST['password_log'];
$error_code = 0;
if($username==NULL){
    $error_code=1;
}else if($password==NULL){
    $error_code=1;
}else if($password==NULL&&$username==NULL){
    $error_code=1;
}else{
	$encoded1 = base64_encode($password);
	$encoded_password = str_rot13($encoded1);
   // echo $encoded_password;
    $user_checking = mysql_num_rows(mysql_query("SELECT * FROM `user` WHERE user_uname = '$username' "));
	 if($user_checking>0){
	 	$pass_c = (mysql_query("SELECT * FROM `user` WHERE user_uname = '$username' and user_pass =  '$encoded_password' "));
        $pass_checking=mysql_num_rows($pass_c);
        if($pass_checking>0){
            $user_array=mysql_fetch_array($pass_c);
            $_SESSION['login'] = $user_array;
            if($user_array['user_type']==1){
                //echo "admin";
            }
            else{
                //echo "user";
            }
        }else{
            $error_code=1;
        }
	 }else{
        $error_code=1;
     }
}
?>
<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4">
<?php
if($error_code == 1){
     $message_error = "ตรวจสอบความถูกต้องอีกครั้งนะครับ";
     require 'pages/alert_wr.php';
     header("refresh: 1; url=?comm=login");
}else{
    $message_error = "กรุณารอสักครู่...";
     require 'pages/alert_succ.php';
     header("refresh: 1; url=?comm=main");
}
?>
</div>
<div class="col-md-4"></div>
</div>