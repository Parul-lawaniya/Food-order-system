<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br> <br>

        <?php 
             if(isset($_SESSION['add']))
             {
                 echo $_SESSION['add'];
                 unset($_SESSION['add']);
             }

             if(isset($_SESSION['upload']))
             {
                 echo $_SESSION['upload'];
                 unset($_SESSION['upload']);
             }

        ?>

        <br> <br>
        <!-- Add Category form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td><input type="file" name="image">
                </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add Category form Ends -->

        <?php
          //check whether the submit Button is Clicked or Not
          if(isset($_POST['submit']))
          {
              //echo "Clicked";

              //1. Get t6he value from Category form 
              $title= mysqli_real_escape_string($conn, $_POST['title']);

              //For radio input ,we need to check whether the button is selected or not
              if(isset($_POST['featured']))
              {
                  //Get the value from form
                  $featured=mysqli_real_escape_string($conn, $_POST['featured']);
              }
              else
              {
                  //Set the default value
                  $featured="No";
              }
              if(isset($_POST['active']))
              {
                  $active= mysqli_real_escape_string($conn, $_POST['active']);
              }
              else
              {
                  $active = "No";
              }
              //Check whether the image is selected or not and set the value for image name accordingly
             // print_r($_FILES['image']);

              //die(); //Break the code here

              if(isset($_FILES['image']['name']))
              {
                  //Upload the image
                  //to upload image we need image name, source path and destination path
                  $image_name= $_FILES['image']['name'];

                  //Upload the image only if image is selected
                  if($image_name!="")
                {

                  //Auto rename our image
                  //Get the extension of our image(jpeg, png, gif, etc) e.g. "specialfood1.jpg"
                  $ext = end(explode('.',$image_name));

                  //Rename the image
                  $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //e.g. Food_Category_834.jpg

                  $source_path= $_FILES['image']['tmp_name'];

                  $destination_path= "../images/category/".$image_name;

                  //Finally Upload the image
                  $upload = move_uploaded_file($source_path, $destination_path);

                  //Check whether the image is uploaded or not
                  //And if the image is not upoloaded then we will stop the process and redirect with error messasge
                  if($upload==false)
                  {
                      //set message
                      $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                      //Redirect to add category page
                      header('location:'.SITEURL.'admin/add-category.php');
                      //stop the process
                      die();
                  }
                }
              }
              else
              {
                  //don't upload image and set the image_name value as blank
                  $image_name="";
              }
              //2. create sql query to insert category into database
              $sql = "INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured = '$featured',
                active='$active'
                ";

                //3. Execute the query and Save in database
                $res = mysqli_query($conn,$sql);

                //4. Check whether the query executed or not and the data added or not
                if($res==true)
                {
                    //Qyery Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    //redirecty to manage Category Page
                    header('location:' .SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //Failed to add category
                    $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
                    //redirecty to manage Category Page
                    header('location:' .SITEURL.'admin/add-category.php');
                }
          }


        ?>
    </div>
</div>


<?php include('partials/footer.php');?>