<?php
session_start();
include "../Admin/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 /***************************insert student attendance data in database***************************/
         
      require '../PHPMailer/src/Exception.php';
      require '../PHPMailer/src/PHPMailer.php';
      require '../PHPMailer/src/SMTP.php';

      $date=date("Y-m-d");     
            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
      
            try {
                //Server settings
      
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ghorineel@gmail.com';                     //SMTP username
                $mail->Password   = 'ghori1732@';                               //SMTP password
                $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
                $mail->setFrom('ghorineel@gmail.com', 'SMS');
               
                $id2="select t1.*,t2.*,t3.* from student as t1 left join parent as t2 on t1.parent_id=t2.parent_id 
                      left join student_attendance as t3 on t1.student_id=t3.student_id  where attendance_status='absent' and s_a_date='$date'";
                $result2=mysqli_query($conn,$id2);
                if(mysqli_num_rows($result2)){
                 
                  while($row2=mysqli_fetch_array($result2)){
                    
                      $email=$row2['e_mail_p'];
                      
                      $mail->addAddress($email);
                    
                  }
                 
                    //$gmail=implode(",",$email);
                 
                 
                       //Add a recipient
                  $mail->addReplyTo('ghorineel@gmail.com', 'no-reply');
        
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Attendance';
                  $mail->Body    = '<!doctype html>
                  <html>
                    <head>
                      <meta name="viewport" content="width=device-width" />
                      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                      <title>Simple Transactional Email</title>
                      <style>
                        /* -------------------------------------
                            GLOBAL RESETS
                        ------------------------------------- */
                        
                        /*All the styling goes here*/
                        
                        img {
                          border: none;
                          -ms-interpolation-mode: bicubic;
                          max-width: 100%; 
                        }
                  
                        body {
                          background-color: #f6f6f6;
                          font-family: sans-serif;
                          -webkit-font-smoothing: antialiased;
                          font-size: 14px;
                          line-height: 1.4;
                          margin: 0;
                          padding: 0;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%; 
                        }
                  
                        table {
                          border-collapse: separate;
                          width: 100%; }
                          table td {
                            font-family: sans-serif;
                            font-size: 14px;
                            vertical-align: top; 
                        }
                  
                        /* -------------------------------------
                            BODY & CONTAINER
                        ------------------------------------- */
                  
                        .body {
                          background-color: #f6f6f6;
                          width: 100%; 
                        }
                  
                        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                        .container {
                          display: block;
                          margin: 0 auto !important;
                          /* makes it centered */
                          max-width: 580px;
                          padding: 10px;
                          width: 580px; 
                        }
                  
                        /* This should also be a block element, so that it will fill 100% of the .container */
                        .content {
                          box-sizing: border-box;
                          display: block;
                          margin: 0 auto;
                          max-width: 580px;
                          padding: 10px; 
                        }
                  
                        /* -------------------------------------
                            HEADER, FOOTER, MAIN
                        ------------------------------------- */
                        .main {
                          background: #ffffff;
                          border-radius: 3px;
                          width: 100%; 
                        }
                  
                        .wrapper {
                          box-sizing: border-box;
                          padding: 20px; 
                        }
                  
                        .content-block {
                          padding-bottom: 10px;
                          padding-top: 10px;
                        }
                  
                        .footer {
                          clear: both;
                          margin-top: 10px;
                          text-align: center;
                          width: 100%; 
                        }
                          .footer td,
                          .footer p,
                          .footer span,
                          .footer a {
                            color: #999999;
                            font-size: 12px;
                            text-align: center; 
                        }
                  
                        /* -------------------------------------
                            TYPOGRAPHY
                        ------------------------------------- */
                        h1,
                        h2,
                        h3,
                        h4 {
                          color: #000000;
                          font-family: sans-serif;
                          font-weight: 400;
                          line-height: 1.4;
                          margin: 0;
                          margin-bottom: 30px; 
                        }
                  
                        h1 {
                          font-size: 35px;
                          font-weight: 300;
                          text-align: center;
                          text-transform: capitalize; 
                        }
                  
                        p,
                        ul,
                        ol {
                          font-family: sans-serif;
                          font-size: 14px;
                          font-weight: normal;
                          margin: 0;
                          margin-bottom: 15px; 
                        }
                          p li,
                          ul li,
                          ol li {
                            list-style-position: inside;
                            margin-left: 5px; 
                        }
                  
                        a {
                          color: #3498db;
                          text-decoration: underline; 
                        }
                  
                        /* -------------------------------------
                            BUTTONS
                        ------------------------------------- */
                        .btn {
                          box-sizing: border-box;
                          width: 100%; }
                          .btn > tbody > tr > td {
                            padding-bottom: 15px; }
                          .btn table {
                            width: auto; 
                        }
                          .btn table td {
                            background-color: #ffffff;
                            border-radius: 5px;
                            text-align: center; 
                        }
                          .btn a {
                            background-color: #ffffff;
                            border: solid 1px #3498db;
                            border-radius: 5px;
                            box-sizing: border-box;
                            color: #3498db;
                            cursor: pointer;
                            display: inline-block;
                            font-size: 14px;
                            font-weight: bold;
                            margin: 0;
                            padding: 12px 25px;
                            text-decoration: none;
                            text-transform: capitalize; 
                        }
                  
                        .btn-primary table td {
                          background-color: #3498db; 
                        }
                  
                        .btn-primary a {
                          background-color: #3498db;
                          border-color: #3498db;
                          color: #ffffff; 
                        }
                  
                        /* -------------------------------------
                            OTHER STYLES THAT MIGHT BE USEFUL
                        ------------------------------------- */
                        .last {
                          margin-bottom: 0; 
                        }
                  
                        .first {
                          margin-top: 0; 
                        }
                  
                        .align-center {
                          text-align: center; 
                        }
                  
                        .align-right {
                          text-align: right; 
                        }
                  
                        .align-left {
                          text-align: left; 
                        }
                  
                        .clear {
                          clear: both; 
                        }
                  
                        .mt0 {
                          margin-top: 0; 
                        }
                  
                        .mb0 {
                          margin-bottom: 0; 
                        }
                  
                        .preheader {
                          color: transparent;
                          display: none;
                          height: 0;
                          max-height: 0;
                          max-width: 0;
                          opacity: 0;
                          overflow: hidden;
                          visibility: hidden;
                          width: 0; 
                        }
                  
                        .powered-by a {
                          text-decoration: none; 
                        }
                  
                        hr {
                          border: 0;
                          border-bottom: 1px solid #f6f6f6;
                          margin: 20px 0; 
                        }
                  
                        /* -------------------------------------
                            RESPONSIVE AND MOBILE FRIENDLY STYLES
                        ------------------------------------- */
                        @media only screen and (max-width: 620px) {
                          table[class=body] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important; 
                          }
                          table[class=body] p,
                          table[class=body] ul,
                          table[class=body] ol,
                          table[class=body] td,
                          table[class=body] span,
                          table[class=body] a {
                            font-size: 16px !important; 
                          }
                          table[class=body] .wrapper,
                          table[class=body] .article {
                            padding: 10px !important; 
                          }
                          table[class=body] .content {
                            padding: 0 !important; 
                          }
                          table[class=body] .container {
                            padding: 0 !important;
                            width: 100% !important; 
                          }
                          table[class=body] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important; 
                          }
                          table[class=body] .btn table {
                            width: 100% !important; 
                          }
                          table[class=body] .btn a {
                            width: 100% !important; 
                          }
                          table[class=body] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important; 
                          }
                        }
                  
                        /* -------------------------------------
                            PRESERVE THESE STYLES IN THE HEAD
                        ------------------------------------- */
                        @media all {
                          .ExternalClass {
                            width: 100%; 
                          }
                          .ExternalClass,
                          .ExternalClass p,
                          .ExternalClass span,
                          .ExternalClass font,
                          .ExternalClass td,
                          .ExternalClass div {
                            line-height: 100%; 
                          }
                          .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important; 
                          }
                          #MessageViewBody a {
                            color: inherit;
                            text-decoration: none;
                            font-size: inherit;
                            font-family: inherit;
                            font-weight: inherit;
                            line-height: inherit;
                          }
                          .btn-primary table td:hover {
                            background-color: #34495e !important; 
                          }
                          .btn-primary a:hover {
                            background-color: #34495e !important;
                            border-color: #34495e !important; 
                          } 
                        }
                  
                      </style>
                    </head>
                    <body class="">
                      <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                        <tr>
                          <td>&nbsp;</td>
                          <td class="container">
                            <div class="content">
                  
                              <!-- START CENTERED WHITE CONTAINER -->
                              <table role="presentation" class="main">
                  
                                <!-- START MAIN CONTENT AREA -->
                                <tr>
                                  <td class="wrapper">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td>
                                            <h1>Attendance</h1>
                                          <p>Hi Sir,</p>
                                          <p>Your Son is Absent Today '.date("d-M-Y",strtotime($date)).' </p>
                                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                            <tbody>
                                              <tr>
                                                <td align="left">
                                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                      <tr>
                                                        <td> <a href="http://localhost/smss/Parent/display_student_attendance_parent.php" target="_blank">Click To Check Attendance</a> </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                  
                              <!-- END MAIN CONTENT AREA -->
                              </table>
                              <!-- END CENTERED WHITE CONTAINER -->
                  
                            </div>
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    </body>
                  </html>'; 
                                  
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                  $mail->send();
                   //echo "mail send";
                  $_SESSION['status']="Mail has been sent";
                  $_SESSION['status_code']="success";
                  header("location:add_attendance_student_teacher.php");
                }
                //Recipients
              
            } catch (Exception $e) {
                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                 echo "mail not send";
                $_SESSION['status']="Email sending failed...";
                $_SESSION['status_code']="error";
                header("location:add_attendance_student_teacher.php");
            }
          
            $_SESSION['status']="Attendance Taken";
            $_SESSION['status_code']="success";
  header("location:add_attendance_student_teacher.php");


?>