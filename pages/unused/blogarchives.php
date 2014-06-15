<?php 
	$pagetitle = "Archives";
	include '../inc/logincheck.php'; 	
	include '../inc/header.php'; 
	include '../inc/nav.php';
?>
<div class="header">
	<img src="../images/blogheader.png" />
</div>
<div class="container">
<?php 
 include '../inc/blogsidebar.php'; 
?>
<div class="blogcontent">
<?php 
	$sql = "SELECT monthname(datePosted), datePosted FROM blog WHERE month(datePosted)=" . $_GET['month']; //retrieve the month 
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
 
	$row = mysqli_fetch_array($result); 
	echo "<h1>" . $row['monthname(datePosted)'] . "</h1>"; //display the month 
 
	$sql = "SELECT blog.*, user.*, category.*, COUNT(comment.blogID) AS commentcount FROM blog INNER JOIN user ON blog.authorID = user.userID INNER JOIN category ON blog.catID = category.catID LEFT JOIN comment ON blog.blogID = comment.blogID WHERE month(blog.datePosted) ='" . $_GET['month'] . "'GROUP BY blog.blogID, comment.blogID ORDER BY blog.dateposted DESC"; //retrieve records that match the month and count the number of comments 
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
 
	while ($row = mysqli_fetch_array($result))
	
	{ 
	echo "<div class='blogpost'><h3><a href='blogpost.php?blogID=" .$row['blogID'] . "'>" . $row['title'] . "</a></h3>"; 
	echo "<p class='blogpostinfo'><em>posted on " . date("F jS Y",strtotime($row['datePosted'])) . " by <strong>" . $row['firstName'] . "</strong> in <strong>" . $row['category'] . "</strong></em></p>"; //display the date, author and category 
	echo "<p>" . (substr(($row['content']),0,300)) . "... " . "<a href='blogpost.php?blogID=" . $row['blogID'] . "'>" . "read more" . "</a>"; //add a 'read more' link
	echo "<p><a href='blogpost.php?blogID=" . $row['blogID'] . "'>" . "Comments (" . $row['commentcount'] . ")</a></div>"; //add the number of comments on the post 
	} 
?> 
</div>
</div>
<?php
	include '../inc/footer.php';
?>