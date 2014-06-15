<?php
	include '../inc/logincheck.php';//Check if the user is logged in, if not redirect to the login page
	include '../inc/nav.php';//include the navigation

include '../inc/connect.php';
		
	$sql = "SELECT * FROM blog WHERE blogID =" . $_GET['blogID'];//Select the post using the blog ID
	
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));//Run the query and put it in the $result variable
	
	$row = mysqli_fetch_array($result);//Save the result from $result in the $row variable
	$pagetitle = $row['title'];//Assign the contents of $row['title'] to the $pagetitle variable

    include '../inc/header.php';//Include the HTML head tag and opening body tag


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
	$sql = "SELECT * FROM blog, user, category WHERE blog.authorID = user.userID && blog.catID = category.catID && blog.blogID = " . $_GET['blogID']; //Use $_GET to retrieve the blogID for the full entry
	
	$result = mysqli_query($con, $sql) or die (mysqli_error($con));//Run the query
	
	while ($row = mysqli_fetch_array($result))
	{
	echo "<h1>" . $row['title'] . "</h1>";	
	
	echo "<p class='blogpostinfo'><em>posted on " . date("F jS Y h:ia",strtotime($row['datePosted'])) . " by <strong>" . $row['firstName'] . "</strong> in <strong>" . $row['category'] . "</strong></em></p>";//Display the date, author and category
	echo "<p class='blogpost'>" . str_replace('\n', '<br />', ($row['content'])) . "</p>";//Use the PHP str_replace function to replace \n in the database with a <br />
	}
?>

<h3 class="blogpostcommentheading">Comments</h3>

<?php
	$sql = "SELECT comment.*, firstName FROM comment, user WHERE comment.authorID = user.userID && comment.blogID = '" . $_GET['blogID'] . "'ORDER BY datePosted DESC ";//retrieve the comments for the blogID
	
	$result = mysqli_query($con, $sql) or die (mysqli_error($con));//run the query
	
	$numrows = mysqli_num_rows($result);
	
	if($numrows == 0)
	{
		echo "<p class='blogpostcomment'>No comments on this post</p>";
	}
	else
	{
	while ($row = mysqli_fetch_array($result))
	{
	echo "<p class='blogpostinfo'><em>posted on " . date("F jS Y", strtotime($row['datePosted'])) . " by <strong>" . $row['firstName'] . "</strong></em></p>"; //Display the date, author and category
		echo "<p class='blogpostcomment'>" . str_replace('\n', '<br />', ($row['comment'])) . "</p>"; //use the PHP str_replace function to swap the \n with a <br /> tag
	}
	}
?>

<h3 class="blogpostcommentheading">Leave a comment</h3>

<form action="blogprocessing.php" method="post">
	<textarea class="commenttextarea" rows="10" cols="60%" name="comment"></textarea>
	<input type="hidden" value="<?php echo $_GET['blogID']; ?>" name="blogID" />
	<p><input class="commentsubmit" type="submit" name="postComment" value="Post Comment" /></p>
</form>
</div>
</div>
<?php
	include '../inc/footer.php';//Include the footer HTML, closing body tag and copyright info
?>