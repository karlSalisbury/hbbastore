<?php 
	include "../inc/connect.php"; 
?> 
<div class="blogsidebar">

<div class="blogcategories">
	<h1>Categories</h1>
		<?php 
		 //display the categories 
			$sql = "SELECT category.*, COUNT(blog.catID) AS catnum FROM category INNER JOIN blog ON category.catID = blog.catID GROUP BY blog.catID ORDER BY category ASC"; //count the number of posts in each category 
			$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
		 
			while ($row = mysqli_fetch_array($result)) 
			{ 
			echo "<p class='blogsidebarcategories'><a href = 'blogcategories.php?catID=" . $row['catID'] . "'>" . $row['category'] . "&nbsp;(" . $row['catnum'] . ")</a></p>"; 
			} 
		?>
</div>
<div class="blogarchive">
	<h1>Archive</h1>
	<?php 
		//display the archive 
		$sql = "SELECT month(datePosted), monthname(datePosted), year(datePosted), COUNT(*) AS monthnum FROM blog GROUP BY monthname(datePosted) ORDER BY month(datePosted)"; 
		//select month and year from datetime field plus group by month 
		$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
		
		while ($row = mysqli_fetch_array($result)) 
		{ 
		echo "<p class='blogsidebararchives'><a href = 'blogarchives.php?month=" . $row['month(datePosted)'] . "'>" . $row['monthname(datePosted)'] . " " . $row['year(datePosted)'] . "&nbsp;(" . $row['monthnum'] . ")</a></p>"; 
		} 
	?>
</div>
</div>