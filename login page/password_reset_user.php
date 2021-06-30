<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='../Admin/assets/img/favicon.ico' />
    <link rel="stylesheet" href="Style.css">
    <title>School Management System</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
</head>
<body>

   <div class="conatiner">
       <div class="forms-conatiner">
           <div class="signin-signup">
               <form action="password_check_user.php" method="POST" class="sign-in-form">
                   <h2 class="title">Reset Password</h2>
                   
                   <div class="input-field">
                       <i class="fa fa-unlock-alt"></i>
                       <input type="password" name="password" placeholder="New Password" required>
                   </div>
                   <div class="input-field">
                       <i class="fa fa-unlock"></i>
                       <input type="password" name="c_password" placeholder="Confirm Password" required>
                   </div>
                  
              <input type="submit" value="Login" name="reset_p" class="btn">
              
              
               </form>
           </div>
       </div>
       <div class="panel-container ">
         <div class="panel left-panel">
             <img src="./image/5.svg" alt="No Picture" class="image">
         </div> 
       </div>
   </div>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php
    if(isset($_SESSION['statuss']) && $_SESSION['statuss'] !=''){
  
?>

<script>
 swal({
  title: "<?php echo $_SESSION['statuss']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_codes']; ?>",
  button: "Ok",
});
</script>
<?php
      unset($_SESSION['statuss']);
    }
   
   ?>
</body>
</html>