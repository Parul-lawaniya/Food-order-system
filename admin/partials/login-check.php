<?php
     //Authorization - Access Control
     //Check whether the user is logged in or not
     if(!isset($_SESSION['user'])) //IF user is not set
     {
         //User is not logged in
         //REdirect to login page with message
         $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Pannel.</div>";
         //REdirect Login Page
         header('location:'.SITEURL.'admin/login.php');
     }
?>