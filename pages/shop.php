<?php
    error_reporting(E_ALL);
    $pagegender = $_GET['gender'];
    session_start();
	$pagetitle = "Shop";
	include '../inc/connect.php';
	include '../inc/functions.php';	
	//include '../inc/logincheck.php';	
	include '../inc/header.php';
	include '../inc/nav.php';
?>

<script> 
function retrieveProductID(productID, data)
    { 
        document.getElementById(productID).value = data; 
    } 
function viewProduct(productID) 
    { 
        window.open('product.php?productID=' + productID + '&dummy=avoid#', 'product', 'width=315, height=315'); 
    } 
</script>



<section class='container productcontainer'>



<div class='categoryblock four columns'>

    
    
<?php
//DISPLAY THE SIDEBAR

if($pagegender == 'male'){
    echo "<div class='categories'><h1 class='guyssidebarheading'>Guys</h1>";
    }
    if($pagegender == 'female'){
    echo "<div class='categories'><h1 class='girlssidebarheading'>Girls</h1>";    
    }

//This code stuffs up the add to cart feature when below the script to add to cart, not sure why?

	$sql = "SELECT category, COUNT(Category) AS totalCategories FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') GROUP BY category ASC";
//Sort by Category
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Sort by Category</h1>";
        echo "<ul>"; 

	while ($row = mysqli_fetch_array($result)){
        
        echo "<li><a class='" . strtolower(str_replace(' ', '', $row['category'])) . "' href='shop.php?category=" . $row['category'] . "&amp;gender=" . $pagegender . "'>" . $row['category'] . "<span class='badge'>" . $row['totalCategories'] . "</span></a></span></li>";
    }
        echo "</ul>";
?>
    
    
<?php
//Sort by colour
	$sql = "SELECT colour, COUNT(colour) AS totalColours FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') GROUP BY colour ASC";
    
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Sort by Colour</h1>";
        echo "<div class='colourswatchescontainer clearfix'>";
        echo "<ul class='list-group colourgroup'>";
    while ($row = mysqli_fetch_array($result)){

        //echo "<li class='colourswatches " . strtolower($row['colour']) . "'><a href='shop.php?colour=" . $row['colour'] . "&amp;gender=" . $pagegender . "'>" . $row['colour'] . " (" . $row['totalColours'] . ")" . "</a></li>";        
        
        
        echo "<li class='colourswatches " . strtolower($row['colour']) . "'><a href='shop.php?colour=" . $row['colour'] . "&amp;gender=" . $pagegender . "'>" . $row['colour'] . " (" . $row['totalColours'] . ")" . "</a></li>";        
    }
        echo "</ul>";
        echo "</div>";
?>

<?php
//Sort by size
	$sql = "SELECT size, COUNT(size) AS totalSizes FROM product WHERE (size IS NOT NULL AND gender='" . $pagegender . "' OR gender='unisex') GROUP BY size ASC";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Sort by Size</h1>";
    while ($row = mysqli_fetch_array($result)){
        echo "<ul>";
        
        echo "<li><a href='shop.php?size=" . $row['size'] . "&amp;gender=" . $pagegender . "'>" . $row['size'] . "<span class='badge'>" . $row['totalSizes'] . "</span>" . "</a></li>";        
        echo "</ul>";
    }
?>



<?php
//Items on Sale
	$sql = "SELECT *, COUNT(onSale) AS totalOnSale FROM product WHERE (onSale IS NOT NULL) AND (gender='" . $pagegender . "' OR gender='unisex')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Items on Sale</h1>";
    while ($row = mysqli_fetch_array($result)){
        echo "<ul>";
        
        echo "<li><a href='shop.php?gender=". $pagegender . "&onSale=yes'>On Sale <span class='badge'>" . $row['totalOnSale'] . "</span>" . "</a></li>";                
        echo "</ul>";
    }
?>
    </div>
</div>




<?php

//if the $_REQUEST 'command' is add than call the PHP addtocart function

	if(isset($_REQUEST['command']) && $_REQUEST['command']=='add' && $_REQUEST['productID']>0){
		$pid=$_REQUEST['productID'];
		addtocart($pid,1);
		
		header('location: shoppingcart.php');
		
		exit();

	}
?>




<!-- Javascript that creates the 'add' command if the 'Add to Cart button is clicked -->

<script>
	function addtocart(pid){
		document.form1.productID.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>




<!-- form with hidden fields to send productID and the $_REQUEST 'command' to the next page -->
	<form name="form1">
		<input type="hidden" name="productID" />
		<input type="hidden" name="command" />
	</form>

<?php
//Change the queries based on what is in $_GET

if(isset($_GET['category'])){
    	$sql = "SELECT * FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') AND category ='" . strtolower ($_GET['category']) . "'";
    echo "<div class='product productheading twelve columns'><h1>Showing all " . $pagegender . " products in " . $_GET['category'] . "</h1></div>";    
}
if(isset($_GET['colour'])){
	$sql = "SELECT * FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') AND colour ='" . strtolower ($_GET['colour']) . "'";    
    echo "<div class='product productheading twelve columns'><h1>Showing all " . $pagegender . " products in " . $_GET['colour'] . "</h1></div>";  
}
if(isset($_GET['size'])){
	$sql = "SELECT * FROM product WHERE (gender ='" . $pagegender . "' OR gender ='unisex') AND size ='" . strtolower ($_GET['size']) . "'";
    echo "<div class='product productheading twelve columns'><h1>Showing all " . $pagegender . " products in " . $_GET['size'] . "</h1></div>";  
}
if(isset($_GET['onSale'])){
	$sql = "SELECT * FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') AND onSale IS NOT NULL";
    echo "<div class='product productheading twelve columns'><h1>Showing all  " . $pagegender . " products on Sale</h1></div>";      
}
if((!isset($_GET['category'])) && (!isset($_GET['colour'])) && (!isset($_GET['size'])) && (!isset($_GET['onSale']))){
	$sql = "SELECT * FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') ORDER BY dateAdded DESC";
    echo "<div class='product productheading twelve columns'><h1>Showing all " . $pagegender . " products</h1></div>";      
}
?>

<style>
    .oldprice{
        text-decoration:line-through;
    } 
</style>



<?php
$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	while ($row = mysqli_fetch_array($result))
		{
        echo "<div class='product searchproduct four columns'>";
        echo "<p class='productimage'><img src='" . ($row['image']) . "'" . "class='scale-with-grid' alt='product' />" . "</p>";
		echo "<div class='productbottom'>";		
		echo "<h1>" . $row['name'] . "</h1>";
				
		echo "<p class='productdescription'>" . substr($row['description'], 0, 20) . " ...</p>";
		echo "<ul>";


        echo "</ul>";

        		
        
				echo "<div class='prices'>";
        if($row['onSale'] != NULL){
            echo "<h1 class='productprice oldprice'><strong>WAS $" . $row['onSale'] . "</strong></h1>";
            echo "<h1 class='productprice'><strong>NOW $" . $row['price'] . "</strong></h1>";
        }
        else{
            echo "<h1 class='productprice'><strong>AUD $" . $row['price'] . "</strong></h1>";
        }
		echo "<p><a class='moreinfo' href='product.php?productID=" . $row['productID'] . "&gender=" . $row['gender'] . "'>More info</a></p>";						
				echo "</div>";		
			echo "</div>";		
		echo "</div>";

			echo "</div>";
		}
	
?>
</section>



<?php
	include '../inc/footer.php';
?>