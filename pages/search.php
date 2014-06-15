<?php 
	$pagetitle = "Search Results"; 
	include "../inc/connect.php";
	//include '../inc/logincheck.php'; 	
	include '../inc/header.php'; 
?>
<?php
	//includes the navigation
	include '../inc/nav.php';
?>

<section class='container topmargincontainer'>
        
	<?php 
		$term = mysqli_real_escape_string($con, $_GET['search']); //prevent SQL injection 
		$sql = "SELECT * FROM product WHERE name LIKE '%$term%' OR description LIKE '%$term%' OR gender LIKE '%$term%' OR size LIKE '%$term%' OR colour LIKE '%$term%'"; // use LIKE to find values that match the term entered in the search field in the title, subtitle and summary columns 
		$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
		$numrow = mysqli_num_rows($result); //count the number of rows returned 
		
		if(empty($_GET['search'])) //display if no search term entered 
		{
			echo "<p class='searchfail'>You did not enter a search term</p>";
		} 
		else if($numrow == 0) //display if no matches to search 
		{ 
			echo "<p class='searchfail'>Sorry, no results match your search for <strong>" . $term . "</strong></p>"; 
		} 
		else 
		{ 
			echo "<p class='searchsuccess'>Your search for <strong>" . $term . "</strong> has retrieved " . $numrow . " results:</p>"; //display the search results 
				while ($row = mysqli_fetch_array($result))
		{
        echo "<div class='product searchproduct four columns'>";
        echo "<p class='productimage'><img src='" . ($row['image']) . "'" . "class='scale-with-grid' alt='product' />" . "</p>";
		echo "<div class='productbottom'>";		
		echo "<h1>" . $row['name'] . "</h1>";
		echo "<p class='productdescription'>" . substr($row['description'], 0, 20) . " ...</p>";
		echo "<ul>";
		//echo "<li>Colour: " . $row['colour'] . "</li>";

        //IF GENDER IS SPECIFIED AS MALE OR FEMALE		
        /*if(($row['gender']) == ('male' || 'female'))
        {
            echo "<li>Gender: " . $row['gender'] . "</li>";
        }
        //IF SIZE EXISTS
        if(isset($row['size']))
        {
            echo "<li>Size: " . $row['size'] . "</li>";
        }*/



        echo "</ul>";

        		
        
				echo "<div class='prices'>";
        if($row['onSale'] != NULL){
            echo "<h1 class='productprice oldprice'><strong>WAS $" . $row['onSale'] . "</strong></h1>";
            echo "<h1 class='productprice'><strong>NOW $" . $row['price'] . "</strong></h1>";
        }
        else{
            echo "<h1 class='productprice'><strong>AUD $" . $row['price'] . "</strong></h1>";
        }
		        echo "<p><a href='product.php?productID=" . $row['productID'] . "&gender=" . $row['gender'] . "'>More info</a></p>";				
				echo "</div>";		
			echo "</div>";		
		echo "</div>";

			echo "</div>";
		} 
		} 
		mysqli_close($con); // close the database connection 
	?>
</section>
<?php 
	include '../inc/footer.php'; 
?> 
