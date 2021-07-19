<?php
    //include constants.php file
    include('../config/constants.php');
    
    //delete using admin id 
     $id = $_GET['id'];
    //sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    //excecute the query
    $res= mysqli_query($conn, $sql);

    //checking whether the query excecuted successfully
    if($res==true)
    {
       
       //session for displaying the message
       $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
       
       //redirect to Manage Admin Page
       header('location:'.SITEURL.'admin/manage-admin.php');

       
    }
    else{

         //failed to delete admin
        // echo "Failed to delete Admin ";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //redirect page to manage-admin page with message.


?>