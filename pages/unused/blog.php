<?php
	$pagetitle = "Minisite - Blog";
?>
<?php
	//includes the header HTML
	include '../inc/logincheck.php';
	include '../inc/header.php';
	include '../inc/connect.php';
?>
<?php
	//includes the navigation
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
	<h1>Recent Blog Posts</h1>
	<?php
		$sql = "SELECT blog.*, user.*, category.*, COUNT(comment.blogID) AS commentcount 
	FROM blog INNER JOIN user ON blog.authorID = user.userID INNER JOIN category ON 
	blog.catID = category.catID LEFT JOIN comment ON blog.blogID = comment.blogID GROUP BY 
	blog.blogID, comment.blogID ORDER BY datePosted DESC LIMIT 0,3"; //display the last 3 blog entries and count the number of comments for each blog entry
		$result = mysqli_query($con, $sql) or die(mysqli_error($con));//Run the query
		
		while ($row = mysqli_fetch_array($result))
		{
		echo "<div class='blogpost'><h3><a href='blogpost.php?blogID=" . $row['blogID'] . "'>" . $row['title'] . "</a></h3>";
		
		echo "<p class='blogpostinfo'><em>posted on " . date("F jS Y h:ia", strtotime($row['datePosted'])) . " by <strong>" . $row['firstName'] . "</strong> in <strong>" . $row['category'] . "</strong></em></p>"; //display the date, author and category
		
		echo "<p class='blogreadmore'>" . str_replace('\n', ' ', (substr(($row['content']),0,300))) . "... " . "<a href='blogpost.php?blogID=" . $row['blogID'] . "'>" . "read more" . "</a></p>";
		//limit the display to 300 characters and add a 'read more' link
		
		echo "<p class='blogcomments'><a href='blogpost.php?blogID=" . $row['blogID'] . "'>" . "Comments (" . $row['commentcount'] . ")</a></p></div>";
		//add the number of comments on the post
		}
	?>
	</div>
</div>
<?php
	//includes the footer
	include '../inc/footer.php';
?>	