<?php
include("includes/connect.php");

if(isset($_GET['del'])){

    $delete_id = $_GET['del'];

    $delete_query = "delete from posts where post_id='
    $delete_id' ";

    if(mysqli_query($mysqli,$delete_query)){

     echo "<script>alert('Post Has Been Deleted')</script>";
     echo "<script>windows.open('view_post.php''_self')</script>";

    }



}




?>