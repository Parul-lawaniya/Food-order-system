<?php
     
     //Include constants.php file here
     include('../config/constants.php');
     //1.Get the id of the admin to be deleted
        $id = $_GET['id'];

     //2.Create sql query to delete admin
     $sql = "DELETE FROM tbl_admin WHERE id=$id" ;

     //Execute the query
     $res = mysqli_query($conn, $sql);

     //Check whether the query is executed successfully or not
     if($res==TRUE)
     {
         //Query added successfully and admin deleted
          //echo "Admin Deleted";
          //Create session variable to display message
          $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";

          //Redirect to Manage Admin page
             header('location:'.SITEURL.'admin/manage-admin.php' );

     }
     else{
         //Failed to delete admin
         //echo "Failed to delete Admin";
          $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again later.</div>";
          header('location:'.SITEURL.'admin/manage-admin.php');     

     }

     //3.Redirect to Manage Admin page with message(success/error)

?>