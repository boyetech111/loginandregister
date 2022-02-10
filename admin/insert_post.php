<html>
  <head>
   <title>inserting new posts</title>
  </head>
<body>
   <form method="post" action="insert_post.php" enctype="multipart/form-data">
        <table width="600" align="center" border="10">
        <tr>
            <td align="center" bgcolor="yellow" colspan="6"><h1>Inserting New Post Here</h1></td>
        </tr>

        <tr>
            <td align="right">Post Title</td>
            <td><input type="text" name="Title" /></td>
        </tr>
        
        <tr>
            <td align="right">Post Author</td>
            <td><input type="text" name="Author"/></td>
        </tr>
        
        <tr>
            <td align="right">Post Keywords</td>
            <td><input type="text" name="Keywords"/></td>
        </tr>
        
        <tr>
            <td align="right">Post Image</td>
            <td><input type="File" name="Image"/></td>
        </tr>
        
        <tr>
            <td align="right">Post Content</td>
            <td><textarea name="content" cols="30" rows="15"></textarea></td>
        </tr>
        
        <tr>
            <td align="center" colspan="6"><input type="submit" name=
            "submit" value="Publish Now"></td>
        </tr>
        </table>
    </form>
</body>
</html>
<?php
include("includes/connect.php");

if(isset($_POST['submit'])){
	
	$post_title = $_POST['Title'];
	$post_date = date('d-m-y');
	$post_author = $_POST['Author'];
	$post_keywords = $_POST['Keywords'];
	$post_content = $_POST['content'];
	$post_image = $_FILES['Image']['name'];
	$image_tmp = $_FILES['Image']['tmp_name'];
	 
	 
	if($post_title=='' or $post_keywords=='' or 
    $post_content=='' or $post_author=='') {
		
		
	echo "<script>alert('any of the fields is 
	empty')</script>";
	
	exit();
	}	
	
    else {
	
	move_uploaded_file($image_tmp, "../images/$post_image");
		
	$insert_query = "insert into posts (post_title,post_date,post_author,post_image,post_keywords,post_content) values 
	(' $post_title',' $post_date','$post_author','$post_image','$post_keywords','$post_content') ";	
	
    // echo $insert_query;
	if(mysqli_query($mysqli,$insert_query)) {
	
    echo "<center><h1>Post Published Successfully!</h1></center>";
	
	}	
		
	}
	 
	 
}





?>