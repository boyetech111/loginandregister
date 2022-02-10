<div id="main_content">
<?php

 include("include/connect.php");

 $select_post = "select * from posts order by rand() LIMIT 
 0,4";

 $run_posts = mysqli_query($mysqli,$select_post); 
 
 while($row=mysqli_fetch_array($run_posts)) {
  
   $post_id = $row['post_id'];
   $post_title = $row['post_title'];
   $post_date = $row['post_date'];
   $post_author = $row['post_author'];
   $post_image = $row['post_image'];
   $post_content = substr($row['post_content'],0,200,);




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
<?php } ?>

<span class="clear"></span>
</div>