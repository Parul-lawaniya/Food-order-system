<?php  include('partials/menu.php');?>
 
    <div class="main-content">
        <div class="wrapper">
               <h1>Update Admin</h1>

          <br><br>

          <?php
                //1.Get the ID of selected admin
                $id = $_GET['id'];

                //2.Select sql query to get the details
                $sql="SELECT * FROM tbl_admin WHERE id=$id";

                //Execute the query
                $res = mysqli_query($conn , $sql);

                //Check whether the query is exwcuted or not
                if($res==TRUE)
                {
                    //Check whether the data is available or not
                    $count=mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1)
                    {
                        //Get the details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name=$row['full_name'];
                        $username=$row['username'];
                    }
                    else
                    {
                        //Redirect to Manage Admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');     
                    }
                }
          ?>

          <form action="" method="POST">
               <table class="tbl-30">
                  <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                  </tr>
                  <tr>
                      <td>Username:</td>
                      <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                      </td>
                  </tr>
               </table>
               </form>

        </div>
    </div>

    <?php
           //Check whether the submit button is clicked or not
           if(isset($_POST['submit']))
           {
               //echo "Button clicked";
               //Get all the values from form to update
               $id = mysqli_real_escape_string($conn, $_POST['id']);
               $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
               $username = mysqli_real_escape_string($conn, $_POST['username']);

               //Create a Sql query to update admin
               $sql = "UPDATE tbl_admin SET
               full_name='$full_name',
               username='$username'
               WHERE id='$id'
               ";

               //Execute the query 
               $res=mysqli_query($conn, $sql);
               
               //Check whether the query executed successfully or not
               if($res==TRUE)
               {
                   //Query executed and admin updated
                   $_SESSION['update'] = "<div class='success'>Admin update successfully</div>";
                   //Redirect to Manage Admin page
                   header('location:'.SITEURL.'admin/manage-admin.php');
               }
               else{
                   //Failed to update admin
                   $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
                   //Redirect to Manage Admin page
                   header('location:'.SITEURL.'admin/manage-admin.php');
               }
           }

    ?>




<?php include('partials/footer.php');?>