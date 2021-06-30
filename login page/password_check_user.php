<?php
session_start();

include "../Admin/connection.php";
if(isset($_POST['reset_p'])){


 $password=$_POST['password'];
 $cpassword=$_POST['c_password'];
 $emailsss= $_SESSION['mails'];
if($password == $cpassword){
    if(isset($_SESSION['user']) == $_SESSION['mails']){

    
    $updatepassword="UPDATE student SET password_s='$password' WHERE e_mail_s='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['pstatus']="Password Has Change";
        $_SESSION['pstatus_code']="success";
       header("location:login_page.php");
    }
    else{
       //echo "Password Is Not Change";
       $_SESSION['statuss']="Password Is Not Change";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
    }
 }elseif(isset($_SESSION['userp']) == $_SESSION['mails']){
    $updatepassword="UPDATE parent SET password_p='$password' WHERE e_mail_p='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['pstatus']="Password Has Change";
        $_SESSION['pstatus_code']="success";
       header("location:login_page.php");
    }
    else{
        $_SESSION['statuss']="Password Is Not Change";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
    }

 }elseif(isset($_SESSION['usert']) == $_SESSION['mails']){
    $updatepassword="UPDATE teacher SET password_t='$password' WHERE e_mail_t='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['pstatus']="Password Has Change";
        $_SESSION['pstatus_code']="success";
       header("location:login_page.php");
    }
    else{
        $_SESSION['statuss']="Password Is Not Change";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
    }

 }else{
    $_SESSION['statuss']="Error";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
 }
}
else{
    $_SESSION['statuss']="Password Is Not Matching";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
}
}
?>