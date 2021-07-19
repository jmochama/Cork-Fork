<?php include('partials/menu.php');?>


<div class ="main-content">
    <div class ="wrapper">
        <h1>Add Admin</h1>
        <br /> <br />

        <?php
         
            if(isset($_SESSION['add']))//checking session set or not
            {
                echo $_SESSION['add'];//Display the session manage
                unset($_SESSION['add']); //Remove Session Message
            }

        ?>

        <form action="" method= "POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">

                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">  
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value=
                        "Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php');?>
<?php 
    //db connection.
    if(isset($_POST['submit']))
    {
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];
      $password= md5($_POST['password']);

      //SQL Query to save data to db

      $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
      ";
    //save in db
     $res = mysqli_query($conn, $sql) or die(mysqli_error());

     //check for successful entry to db
     if ($res==TRUE){
              
        // echo ("Data Inserted");
        // Session Variable to Display Message
        $_SESSION['add'] = "Admin Added Successfuly";
        //Redirect Page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
     
     }

    else{
     
        // echo ("Failed to Insert Data");
        $_SESSION['add'] = "Failled to add Admin";
        //Redirect Page to add admin
        header("location:".SITEURL.'admin/add-admin.php');
     
    }

}  
?>