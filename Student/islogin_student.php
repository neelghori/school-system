<?php
session_start();
error_reporting(0);
if($_SESSION['student'] != "" || $_SESSION['student'] != 0){
    header("location:../Parent/index.php");
}

?>