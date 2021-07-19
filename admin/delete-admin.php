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
        //admin deleted successfully
        echo "Admin deleted";
       
    }
    else{

         //failed to delete admin
         echo "Failed to delete Admin ";
    }
    //redirect page to manage-admin page with message.


?>