<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
             
        <br><br>

        <?php
                if(isset($_SESSION['add']))  //Checking whether the session is set or not 
                {
                    echo $_SESSION['add']; //Displaying the message
                    unset($_SESSION['add']); //Removing the mesaage
                }
                    
         ?>

       

        <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" placeholder="Add Admin" class="btn-secondary">

                    </td>
                </tr>
               
            </table>

            
        </form>

    </div>
</div>




<?php include('partials/footer.php'); ?>

<?php

   //Process the value from form and save it in database
   //Check whether the button is clicked or not
   if(isset($_POST["submit"]))
   {
       //Button clicked
       //echo "Button clicked";

       //1.Get data from form
       //$full_name = $_POST['full_name'];
       //$username = $_POST['username'];
       //$password = md5($_POST['password']);

       $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $password = mysqli_real_escape_string($conn, md5($_POST['password']));

       //2.Sql query to save the data into database
       $sql= "INSERT INTO tbl_admin SET
       full_name = '$full_name',
       username = '$username',
       password = '$password'
       ";

     //3.Executing query and saving data into database
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       //4.Check whether the (query is executed) data is inserted or not and display appropriate message
       if($res==TRUE)
       {
           //Data inserted
           //echo "Data inserted";
           //Created a session variable to display message
           $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
           //Redirect page Manage Admin
           header("location:".SITEURL.'admin/manage-admin.php');
       }
       else{
           //Failed to insert data
           //echo "Failed to insert data";
           //Created a session variable to display message
           $_SESSION['add'] = "<div class='error'>Failed To Add Admin</div>";
           //Redirect page Manage Admin
           header("location:".SITEURL.'admin/add-admin.php');
       }
    }
   
?>











