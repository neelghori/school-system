<?php
session_start();
error_reporting(0);
include "../Admin/connection.php";

if(isset($_POST['otp_s'])){


$s_otp=$_POST['otp'];
 $o_otp= $_SESSION['otp'];
if($s_otp == $o_otp){
    header("location:password_reset_user.php");
}
else{
   // $msg="OTP Enter Is Wrong";
    $_SESSION['status']="OTP Enter Is Wrong";
    $_SESSION['status_code']="error";
    header("location:otp_check_login.php");
}

}


?>