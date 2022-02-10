<div id="sidebar">

<div id="searchbox">

    <form action="search.php" method="get" enctype=
    "multipart/form-data">

    
    <input type="text" name="value" placeholder="Search 
    this site" size="25">

    <input type="submit" name="search" value="search">
    





    </form>

</div>


<div id="social">
   <h2 align="center">Follow Us</h2>
   <a href="http://www.facebook.com/pareshan" target=
   "_blank"><img src="images/facebook.jpg""></a>
   <img src="images/twitter.jpg">
   <img src="images/googleplus.jpg">
   <img src="images/pinterest.jpg"> 
   
</div>

<center>
<?php
include("include/connect.php");

$query = "select * from posts  order by post_id DESC LIMIT 0,5";

    $run = mysqli_query($mysqli,$query);

    while ($row=mysqli_fetch_array($run)) {

    $oost_id = $row['post_id'];
    $title = $row['post_title'];
    $image = $row['post_image'];
  
?> 
    
    
    <h3 style="color: yellow">Recent Posts</h3>
    <a href="pages.php?id=<?php echo $post_id; ?>">
    <h3 style="color: yellow"><?php echo $title; ?></h3></a>

    <a href="pages.php?id=<?php echo $post_id; ?>">
    <img src='images/<?php echo $image; ?>' width='140' 
    height='140'></a>

    
    

<?php } ?>

</center>
</div>

</div>