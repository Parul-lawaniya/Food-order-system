<?php include('partials/menu.php');?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Add Food</h1>

                <br><br>

                <?php 
                     if(isset($_SESSION['upload']))
                     {
                         echo $_SESSION['upload'];
                         unset($_SESSION['upload']);
                     }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                       <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" placeholder="Title of the food"></td>
                       </tr>
                       <tr>
                           <td>Description:</td>
                           <td><textarea name="description" id="" cols="30" rows="5" placeholder="Description of the food"></textarea></td>
                       </tr>
                       <tr>
                           <td>Price:</td>
                           <td><input type="number" name="price"></td>
                       </tr>
                       <tr>
                           <td>Select Image:</td>
                           <td><input type="file" name="image"></td>
                       </tr>
                       <tr>
                           <td>Category:</td>
                           <td>
                               <select name="category">
                                   <?php
                                     //Create php code to select categories from database
                                     //1.Create SQL to get all the active categories from database
                                      $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                      //Executing query
                                      $res = mysqli_query($conn, $sql);

                                      //Count rows to check whether we have categories or not
                                      $count = mysqli_num_rows($res);

                                      //If count is greater than zero, we have categories else we donot have categories
                                      if($count>0)
                                      {
                                          //We have category
                                          while($row=mysqli_fetch_assoc($res))
                                          {
                                              //Get the details of category
                                              $id=$row['id'];
                                              $title=$row['title'];
                                              ?>
                                                <option value=" <?php echo $id; ?>"><?php echo $title; ?></option>
                                              <?php
                                          }
                                      }
                                      else
                                      {
                                          //We don't have category
                                          ?>
                                          <option value="0">No Category Found</option>
                                          <?php
                                      }
                                     //2.Display to dropdownmenu
                                   ?>
                                   
                               </select
                           ></td>
                       </tr>
                       <tr>
                           <td>Featured:</td>
                           <td>
                               <input type="radio" name="featured" value="yes">Yes
                               <input type="radio" name="featured" value="no">No
                            </td>
                       </tr>
                       <tr>
                           <td>Active:</td>
                           <td>
                           <input type="radio" name="active" value="yes">Yes
                               <input type="radio" name="active" value="no">No 
                           </td>
                       </tr>
                       <tr>
                           <td colspan="2">
                               <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                           </td>
                       </tr>
                    </table>
                </form>

                <?php
                    //Check whether the button is clicked or not
                    if(isset($_POST['submit']))
                    {
                        //Add the food in database
                        //echo "Clicked";
                        //1.Get the data from the form
                        $title = mysqli_real_escape_string($conn, $_POST['title']);
                        $description = mysqli_real_escape_string($conn, $_POST['description']);
                        $price = mysqli_real_escape_string($conn, $_POST['price']);
                        $category = mysqli_real_escape_string($conn, $_POST['category']);

                        //Check whether the radio button for featured and active are checked or not
                         if(isset($_POST['featured']))
                         {
                            $featured = mysqli_real_escape_string($conn, $_POST['featured']);
                         }
                         else
                         {
                             $featured = "No"; //Setting the default value
                         }
                         if(isset($_POST['active']))
                         {
                            $active = mysqli_real_escape_string($conn, $_POST['active']);
                         }
                         else
                         {
                             $active = "No"; //Setting the default value
                         }


                         //2.Upload the image if selected
                         //Check whether the select image is clicked or not and upload the image only if image is selected
                         if(isset($_FILES['image']['name']))
                         {
                             //Get the details of selected image
                             $image_name = $_FILES['image']['name'];

                             //Check whether the image os selected or not and upload  image only if selected
                             if($image_name!="")
                             {
                                 //Image is selected
                                 //A. Rename the image
                                    //Get the extension of selected image(jpg,gif,png,etc)
                                    $ext = end(explode('.',$image_name));

                                    //Create new name for image
                                    $image_name = "Food-Name-".rand(0000,9999).".".$ext;

                                 //B. Upload the image
                                 //Get source path and destination path

                                 //Source path is the current location of the image
                                 $src = $_FILES['image']['tmp_name'];
                                 //Destination path for the image to be uploaded
                                 $dst = "../images/food/".$image_name;

                                 //Finally upload the food image
                                 $upload = move_uploaded_file($src, $dst);

                                 //Check whether image uploaded or not
                                 if($upload==false)
                                 {
                                     //Failed to upload image
                                     //Redirect to add food page with error message
                                     $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>"; 
                                     header('location:'.SITEURL.'admin/add-food.php');
                                     //Stop the process
                                     die();
                                 }
                             }

                         }
                         else
                         {
                             $image_name = ""; //Setting default value as blank
                         }
                         //3.Insert into database
                         //Create sql query to save or add food
                         $sql2 = "INSERT INTO tbl_food SET
                         title = '$title',
                         description = '$description',
                         price = $price,
                         image_name = '$image_name',
                         category_id = $category,
                         featured = '$featured',
                         active = '$active'
                         ";
                         //Execute the query
                         $res2 = mysqli_query($conn, $sql2);

                         //Check whether the data inserted or not
                         //4.Redirect with message to manage food page
                         if($res2==true)
                         {
                             //Data inserted successfully
                             $_SESSION['add'] = "<div class='success'>Food Added Successfully</div>";
                             header('location:'.SITEURL.'admin/manage-food.php');
                         }
                         else
                         {
                             //Failed to insert data
                             $_SESSION['add'] = "<div class='error'>Failed to add food.</div>";
                             header('location:'.SITEURL.'admin/manage-food.php');
                         }
                         
                    }
                ?>   
            </div>
        </div>






<?php include('partials/footer.php');?>