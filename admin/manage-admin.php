<?php include('partials/menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class= "wrapper">
              <h1>Manage Admin</h1>
              <br />
                    <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];//add session message
                            unset($_SESSION['add']);//remove session message
                        }
                        
                            if(isset($_SESSION['delete']))
                            {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                            }
                        
                    
                    ?>
                    <br /><br/><br/>
                     <!-- Button to Add Admin  -->
                     <a href="add-admin.php" class ="btn-primary">Add Admin</a>

                     <br />
                     <br />
               <table class ="tbl-full">
                   <tr>
                       <th>S.N.</th>
                       <th>Full Name</th>
                       <th>Username</th>
                       <th>Actions</th>
                   </tr>
                    <?php
                    
                    $sql= "SELECT * FROM tbl_admin";
                    //execute the query
                    $res= mysqli_query($conn,$sql);
                    //check if query worked or not
                    if($res==TRUE)
                    {
                        //Count rows to check whether we have data in db
                        $count= mysqli_num_rows($res); //function gets all rows
                        $sn=1;
                        //check num of rows
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //getting the data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //display in table
                                ?>
                                        <tr>
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $full_name;?></td>
                                            <td><?php echo $username;?></td>
                                            <td>
                                                <a href="#" class="btn-secondary"> Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">  Delete Admin</a>
                                                
                                                
                                            </td>
                                        </tr>


                                <?php
                    
                            }
                        }
                        else
                        {


                        }
        

                    }
                    ?>
                  
               </table>

            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php');?>


