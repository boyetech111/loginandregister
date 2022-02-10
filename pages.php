<html>
    <head>
     <title>olayinka</title>
	 <link rel="stylesheet" href="style.css" media="all"/>
    </head>
  
  
<body>
<div><?php include("include/header.php");?></div>
<div><?php include("include/navbar.php");?></div>

<div id="main_content">
<?php
 include("include/connect.php");

 if (isset($_GET['id'])) {

$page_id = $_GET['id'];

    $select_query = "select * from posts where post_id='
    $page_id'";
 $run_query = mysqli_query($mysqli,$select_query); 
 
 while($row=mysqli_fetch_array($run_query)) {
  
   $post_id = $row['post_id'];
   $post_title = $row['post_title'];
   $post_date = $row['post_date'];
   $post_author = $row['post_author'];
   $post_image = $row['post_image'];
   $post_content = $row['post_content'];




?>
<div>

<h2><?php echo $post_title; ?></h2>

<p align="left">Published On:&nbsp;&nbsp;<b><?php echo $post_date; ?>
</b></p>

<p align="right">Posted By:&nbsp;&nbsp;<b><?php echo $post_author; ?>
</b></p>

<div>
   <center><img src="images/<?php echo $post_image; ?>"  width=
   "" height="" /></center>
</div>

<p align="justify"><?php echo $post_content; ?></p>

<p align="right"><a href="pages.php?id=<?php echo $post_id; 
?>">Read More</a></p>

</div>
<?php }  }?>

<span class="clear"></span>
</div>







<div><?php include("include/sidebar.php");?></div>



<div id="footer">Footer</div>

</body>  
</html>