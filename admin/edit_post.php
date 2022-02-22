<html>
    <head>
     <title>Admin Panel</title>
     <link rel="stylesheet" href="admin_style.css">
    </head>
<body>
<div id="header">
 <a href="index.php"> 
    <h1>Welcome to the Admin Panel</h1></a>
</div>

 <div id="sidebar">

<h2><a href="#">Logout</a></h2>
<h2><a href="view_post.php">View Posts</a></h2>
<h2><a href="#">Insert New Post</a></h2>
<h2><a href="#">View Comments</a></hh2>


</div>
<?php

include("includes/connect.php");

if(isset($_GET['edit'])){

    $edit_id = $_GET['edit'];

    $edit_query = "select * from posts where post_id='$edit_id'";

    $run_edit = mysqli_query($mysqli,$edit_query);

        $edit_row=mysqli_fetch_array($run_edit);
        if($edit_row){
            $post_id = $edit_row['post_id'];
            $post_title = $edit_row['post_title'];
            $post_author = $edit_row['post_author'];
            $post_keywords = $edit_row['post_keywords'];
            $post_image = $edit_row['post_image'];
            $post_content = $edit_row['post_content'];  
    
        }
       

}

?>
   <form method="post" action="" enctype="multipart/form-data">
        <table width="600" bgcolor="orange" align="center" border="10">
        <tr>
            <td align="center" bgcolor="yellow" colspan="6"><h1>Edit The Post Here</h1></td>
        </tr>

        <tr>
            <td align="right">Post Title</td>
            <td><input type="text" name="Title" size="30" value="<?php echo isset($post_title)?$post_title:""; ?>"/> </td>
        </tr>
        
        <tr>
            <td align="right">Post Author</td>
            <td><input type="text" name="Author" size="30" value="<?php echo isset($post_author)?$post_author:""; ?>"/></td>
        </tr>
        
        <tr>
            <td align="right">Post Keywords</td>
            <td><input type="text" name="Keywords " size="30" value="<?php echo isset($post_keywords)?$post_keywords:""; ?>"/></td>
        </tr>
        
        <tr>
            <td align="right">Post Image</td>
            <td><img src="../images/<?php echo isset($post_image)?$post_image:"";?>"></td>
        </tr>
        
        <tr>
            <td align="right">Post Content</td>
            <td><textarea name="content" cols="30" rows="15" <?php echo isset($post_content)?$post_content:""; ?>></textarea></td>
        </tr>
        <input type="hidden" name="post_id" value="<?php echo $post_id ?>" />
        <tr>
            <td align="center" colspan="6"><input type="submit" name=
            "submit" value="Update Now"></td>
        </tr>
        </table>
    </form>
</body>
</html>
<?php
include("includes/connect.php");

if(isset($_POST['submit'])){
    
	$post_title = $_POST['Title'];
    $post_id = $_POST['post_id'];
	$post_date = date('d-m-y');
	$post_author = $_POST['Author'];
	$post_keywords = $_POST['Keywords_'];
	$post_content = $_POST['content'];
	// $post_image = $_FILES['Image']['name'];
	// $image_tmp = $_FILES['Image']['tmp_name'];

	if($post_title=='' or $post_keywords=='' or $post_content=='' or $post_author=='') {
	
	echo "<script>alert('any of the fields is 
	empty')</script>";
	
	exit();

	}else {
	// move_uploaded_file($image_tmp, "../images/$post_image");
		
	$insert_query = "
    update posts set post_title = '$post_title', post_date = ". date('d-m-y').", post_author = 
    '$post_author', post_keywords =  '$post_keywords', post_content = '$post_content', post_content = 
    '$post_content'
    where post_id = '$post_id' ";	

    // echo $insert_query;
	if(mysqli_query($mysqli, $insert_query)) {
	
    echo "<center><h1>Post Published Successfully!</h1></center>";
	header('location:edit_post.php?edit='.$post_id);
	}	
		
	}
	 
	 
}





?>