<?php
    session_start();
	$pagetitle = "Has Beens begin again";
?>
<?php
	//includes the header HTML
	//include '../inc/logincheck.php';
	include '../inc/header.php';
	include '../inc/connect.php';
	include '../inc/nav.php';
?>
	
<!-- Place somewhere in the <body> of your page -->
<div class='sliderblock'>
<section class='frontpagecontainer container'>

<?php
	if(isset($_SESSION['success']))
	{
		echo '<p class="searchsuccess">' . $_SESSION['success'] . '</p>'; // Display an error wrapped in a <p> tag with the class "error" 
		unset ($_SESSION['success']); //Unset session error
	}
?>

<div class="flexslider carousel">
  <ul class="slides">
    <li>
      <a href='shop.php?category=Skirts&gender=female'><img src="../images/slide2.jpg" /></a>
    </li>
    <li>
      <a href='shop.php?category=Coats%20and%20Jackets&gender=male'><img src="../images/slide3.png" /></a>
    </li>      
  </ul>
</div>

    
    
<!-- THIS CAROUSEL DOESN'T WORK YET-->    
<!--<h1>New Products</h1>-->    
    
<!--<div class="flexslidercarousel carousel carouselcontainer">
  <ul class="slides">
    <li>
    <h2>Yo dog</h2>
      <img src="../images/slidercarousel/test1.jpg" />
    </li>
    <li>
      <img src="../images/slidercarousel/test2.jpg" />
    </li>
    <li>
      <img src="../images/slidercarousel/test3.jpg" />
    </li>
    <li>
      <img src="../images/slidercarousel/test4.jpg" />
    </li>
    <li>
      <img src="../images/slidercarousel/test5.jpg" />
    </li>      
  </ul>
</div>-->
	
	
		<img class='img-responsive' width=100% src='../images/newproducts.png'/>

</section>

	
</div>
<div class='newproductcontainer'>
    <div class='container'>
	<?php
	    
		$sql = "SELECT * FROM  `product` ORDER BY  `product`.`dateAdded` DESC LIMIT 0 , 4";

		$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
		
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

		} 
		mysqli_close($con); // close the database connection 
	?>

		
		
	</div>
</div>	
<?php
	//includes the footer html
	include '../inc/footer.php';
?>