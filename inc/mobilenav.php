<?php
    echo "<div class='categories'><h1 class='guyssidebarheading'>Guys</h1>";
	

    echo "<div class='categories'><h1 class='guyssidebarheading'>Girls</h1>";    
	$sql = "SELECT category, COUNT(Category) AS totalCategories FROM product WHERE (gender='female' OR gender='unisex') GROUP BY category ASC";
	//Sort by Category
	
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Sort by Category</h1>";
        echo "<ul>"; 

	while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?category=" . $row['category'] . "&amp;gender=female'>" . $row['category'] . " (" . $row['totalCategories'] . ")</a></span></li>";
    }
        echo "</ul>";
?>
    
<style>

    .white a:link, .white a:visited{
        background-color: #f0efef!important;
    }
    .black a:link, .black a:visited{
        background-color: #000!important;
    }
    .brown a:link, .brown a:visited{
        background-color: #594a41!important;    
    }
    .orange a:link, .orange a:visited{
        background-color: #f05a28!important;    
    }
    .yellow a:link, .yellow a:visited{
        background-color: #fff100!important;    
    }
    .checks a:link, .checks a:visited{
        background-image: url('../images/checks.png');
        background-size: cover;
    }
    .floral a:link, .floral a:visited{
        background-image: url('../images/floral.png');
        background-size: cover;
    }    
    
</style> 
    
<?php
//Sort by colour
	/*$sql = "SELECT colour, COUNT(colour) AS totalColours FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') GROUP BY colour ASC";
    
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Sort by Colour</h1>";
        echo "<div class='colourswatchescontainer clearfix'>";
        echo "<ul class='list-group colourgroup'>";
    while ($row = mysqli_fetch_array($result)){

        //echo "<li class='colourswatches " . strtolower($row['colour']) . "'><a href='shop.php?colour=" . $row['colour'] . "&amp;gender=" . $pagegender . "'>" . $row['colour'] . " (" . $row['totalColours'] . ")" . "</a></li>";        
        
        
        echo "<li class='colourswatches " . strtolower($row['colour']) . "'><a href='shop.php?colour=" . $row['colour'] . "&amp;gender=" . $pagegender . "'>" . $row['colour'] . " (" . $row['totalColours'] . ")" . "</a></li>";        
    }
        echo "</ul>";
        echo "</div>";*/
?>

<?php
//Sort by size
	/*$sql = "SELECT size, COUNT(size) AS totalSizes FROM product WHERE (size IS NOT NULL AND gender='" . $pagegender . "' OR gender='unisex') GROUP BY size ASC";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Sort by Size</h1>";
    while ($row = mysqli_fetch_array($result)){
        echo "<ul>";
        
        echo "<li><a href='shop.php?size=" . $row['size'] . "&amp;gender=" . $pagegender . "'>" . $row['size'] . " (" . $row['totalSizes'] . ")" . "</a></li>";        
        echo "</ul>";
    }*/
?>



<?php
//Items on Sale
	/*$sql = "SELECT *, COUNT(onSale) AS totalOnSale FROM product WHERE (onSale IS NOT NULL) AND (gender='" . $pagegender . "' OR gender='unisex')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1>Items on Sale</h1>";
    while ($row = mysqli_fetch_array($result)){
        echo "<ul>";
        
        echo "<li><a href='shop.php?gender=". $pagegender . "&onSale=yes'>On Sale (" . $row['totalOnSale'] . ")" . "</a></li>";                
        echo "</ul>";
    }*/
?>
    </div>
</div>



















































<div id='mobilenavbar'>
    
    <div class='categoryblock one-third-column'>
    <div class='mobilecategories'>

        
		<form action="search.php" method="get">
			<input type="text" id='tags' name="search" placeholder="Search" />
		</form>        
        
        
    <div class='mobilenavcategoryblock one-third-column'>
    <div class='mobilenavcategories'>
        <h1 id='mobilenavgirlsheading'>Girls</h1>
        <div id='mobilenavgirlslist'>
        <h1 id='mobilenavgirlscategory'>Sort by Category</h1>
        <ul id='mobilenavgirlscategorylist'>
            <li><a href='shop.php?category=Shoes&amp;gender=female'>Shoes (1)</a></span></li>
            <li><a href='shop.php?category=Skirts&amp;gender=female'>Skirts (2)</a></span></li>
            <li><a href='shop.php?category=Dresses&amp;gender=female'>Dresses (1)</a></span></li>
            <li><a href='shop.php?category=Bags&amp;gender=female'>Bags (1)</a></span></li>
        </ul>    

    <h1 id='mobilenavgirlscolour'>Sort by Colour</h1>
<div id='mobilenavgirlscolourlist' class='colourswatchescontainer clearfix'>
    <ul class='list-group mobilenavcolourgroup'><li class='colourswatches black'><a href='shop.php?colour=Black&amp;gender=female'>Black (1)</a></li><li class='colourswatches brown'><a href='shop.php?colour=Brown&amp;gender=female'>Brown (1)</a></li><li class='colourswatches orange'><a href='shop.php?colour=Orange&amp;gender=female'>Orange (1)</a></li><li class='colourswatches yellow'><a href='shop.php?colour=Yellow&amp;gender=female'>Yellow (1)</a></li><li class='colourswatches floral'><a href='shop.php?colour=Floral&amp;gender=female'>Floral (1)</a></li></ul></div>
    
    <h1 id='mobilenavgirlssize'>Sort by Size</h1>
    <ul id='mobilenavgirlssizelist'>
        <li><a href='shop.php?size=One Size Fits All&amp;gender=female'>One Size Fits All (2)</a></li>
        <li><a href='shop.php?size=8&amp;gender=female'>8 (2)</a></li>
        <li><a href='shop.php?size=10&amp;gender=female'>10 (1)</a></li>
    </ul>


    <h1 id='mobilenavgirlssale'>Items on Sale</h1>
    <ul id='mobilenavgirlssalelist'>
        <li><a href='shop.php?gender=female&onSale=yes'>On Sale (0)</a></li>
    </ul>
        </div>
<?php
	if (isset($_SESSION['login'])){
        echo "<h1><a href='logout.php'>Logout</a></h1>";
		}
	if (!isset($_SESSION['login'])){
        echo "<h1><a href='loginpage.php'>Login</a></h1>";
		}
?>		
        <h1><a href='contact.php'>Contact</a></h1>
        <h1><a href='about.php'>About</a></h1>




				</div>
			</div>
		</div>
	</div>
</div>