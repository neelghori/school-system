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
               <form action="otp_check_user.php" method="POST" class="sign-in-form">
                   <h2 class="title">OTP</h2>
                   <p style="color:green;font-size:20px;"><?php echo $_SESSION['msgss'];?></p>
                    
                   <div class="input-field">
                       <i class="fas fa-key"></i>
                       <input type="number" name="otp" placeholder="Enter OTP" required>
                   </div>
                  
              <input type="submit" value="Login" name="otp_s" class="btn">
              
              
               </form>
           </div>
       </div>
       <div class="panel-container ">
         <div class="panel left-panel">
             <img src="./image/4.svg" alt="No Picture" class="image">
         </div> 
       </div>
   </div>
   
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
  
?>

<script>
 swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
</script>
<?php
      unset($_SESSION['status']);
    }
   
   ?>
</body>
</html>