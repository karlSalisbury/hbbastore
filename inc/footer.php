<footer>

<div class='container'>

	<div class='four columns'>
		<h1>Store</h1>
		<ul>
			<a href='shop.php?gender=male' ><li>Guys</li></a>			
			<a href='shop.php?gender=female' ><li>Girls</li></a>
		</ul>
	</div>

	<div class='four columns'>
		<h1>Customer Service</h1>
		<ul>
			<a href='privacypolicy.php'><li>Privacy Policy</li></a>
			<a href='about.php' ><li>FAQ</li></a>
			<a href='register.php' ><li>Create Account</li></a>
		</ul>
	</div>

	<div class='four columns'>
		<h1>Contact</h1>
		<ul>
			<li>04 68 353 777</li>
			<li>karl.salisbury@gmail.com</li>
		</ul>
	</div>

	<div class='socialmedia four columns'>
		<h1>Follow us on</h1>
		<ul>
			<a href='http://www.facebook.com' ><li><img src='../images/facebooksmall.png'</li></a>
			<a href='http://www.twitter.com' ><li><img src='../images/twittersmall.png'</li></a>
			<a href='http://www.google.com' ><li><img src='../images/googlesmall.png'</li></a>
			<a href='http://www.pinterest.com' ><li><img src='../images/pinterestsmall.png'</li></a>
		</ul>		
	</div>

</div>


<div class='container'>
	<div class='twelve columns'>
		<p class='disclaimer'>&copy; Karl Salisbury <script> var year = new Date(); document.write(year.getFullYear());</script>
		<noscript>2014</noscript>  
		</p>
	</div>
</div>

    
</footer>
    
    <div class="formcontainer">
	<h2>Please login to view your cart and make purchases</h2>
<?php
	if (isset($_SESSION['error'])) //if session error is set
	{
		echo "<p class='error'>" . $_SESSION['error'] . '</p>'; //display error messages
		unset($_SESSION['error']); //Unset session error
	}
	if (isset($_SESSION['success']))
	{
		echo "<p class='success'>" . $_SESSION['success'] . '</p>';
		unset($_SESSION['success']);
	}
?>
<div class="formbox">
	<form action="loginprocessing.php" method="post">	
		<!--<label>Username</label><br />-->
		<input type="text" name="username" placeholder='Username' /><br />
		<!--<label>Password</label><br />-->
		<input type="password" name="password" placeholder='Password' /><br />
		<p><input class='arrowbutton' type="submit" name="login" value="login" /></p>
	</form>
    <p>Don't have a login? You can <a href="registration.php">Create a new account</a></p>
	</div>
</div>    
    
    
    
    
    
    
</div>






















    
    
























<!--MOBILE NAVIGATION-->
<div id='mobilenavbar'>
    
    <div class='categoryblock one-third-column'>
    <div class='mobilecategories'>

        
		<form action="search.php" method="get">
			<input type="text" id='tags' name="search" placeholder="Search" />
		</form>        
        
        
    <div class='mobilenavcategoryblock one-third-column'>
    <div class='mobilenavcategories'>

	
	
<h1><a href='index.php'>Home</a></h1>
	
	
	
<!--BEGIN DIV THAT CONTAINS THE GIRLS MOBILE NAVIGATION -->
    <h1 id='mobilenavgirlsheading'>Girls</h1>
    <div id='mobilenavgirlslist'>
<?php
	include "../inc/connect.php";   
	$sql = "SELECT category, COUNT(Category) AS totalCategories FROM product WHERE (gender='female' OR gender='unisex') GROUP BY category ASC";
	//Sort by Category
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1 id='mobilenavgirlscategory'>Sort by Category</h1>";
        echo "<ul id='mobilenavgirlscategorylist'>"; 
	while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?category=" . $row['category'] . "&amp;gender=female'>" . $row['category'] . " (" . $row['totalCategories'] . ")</a></li>";
    }
        echo "</ul>";		
?>

<?php
//Sort by colour
    echo "<h1 id='mobilenavgirlscolour'>Sort by Colour</h1>";
	echo "<div id='mobilenavgirlscolourlist' class='colourswatchescontainer clearfix'>";
	
	$sql = "SELECT colour, COUNT(colour) AS totalColours FROM product WHERE (gender='female' OR gender='unisex') GROUP BY colour ASC";
    
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
        echo "<div class='colourswatchescontainer clearfix'>";
        echo "<ul class='list-group mobilenavcolourgroup'>";
    while ($row = mysqli_fetch_array($result)){        
        
        echo "<li class='colourswatches " . strtolower($row['colour']) . "'><a href='shop.php?colour=" . $row['colour'] . "&amp;gender=female'>" . $row['colour'] . " (" . $row['totalColours'] . ")" . "</a></li>";        
    }
        echo "</ul>";
        echo "</div>";
        echo "</div>";		
?>
<?php
//Sort by size
    echo "<h1 id='mobilenavgirlssize'>Sort by Size</h1>";

	$sql = "SELECT size, COUNT(size) AS totalSizes FROM product WHERE (size IS NOT NULL AND gender='female' OR gender='unisex') GROUP BY size ASC";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    
	echo "<ul id='mobilenavgirlssizelist'>";

    while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?size=" . $row['size'] . "&amp;gender=female'>" . $row['size'] . " (" . $row['totalSizes'] . ")" . "</a></li>";        
    }
	echo "</ul>";
?>
<?php
//Items on Sale
	$sql = "SELECT *, COUNT(onSale) AS totalOnSale FROM product WHERE (onSale IS NOT NULL) AND (gender='female' OR gender='unisex')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1 id='mobilenavgirlssale'>Items on Sale</h1>";
		echo "<ul id='mobilenavgirlssalelist'>";

    while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?gender=female&onSale=yes'>On Sale (" . $row['totalOnSale'] . ")" . "</a></li>";                
    }
        echo "</ul>";
?>

        </div>
<!--END GIRLS NAVIGATION -->













<!--BEGIN DIV THAT CONTAINS THE GUYS MOBILE NAVIGATION -->
    <h1 id='mobilenavguysheading'>Guys</h1>
    <div id='mobilenavguyslist'>
<?php
	include "../inc/connect.php";   
	$sql = "SELECT category, COUNT(Category) AS totalCategories FROM product WHERE (gender='male' OR gender='unisex') GROUP BY category ASC";
	//Sort by Category
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1 id='mobilenavguyscategory'>Sort by Category</h1>";
        echo "<ul id='mobilenavguyscategorylist'>"; 
	while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?category=" . $row['category'] . "&amp;gender=male'>" . $row['category'] . " (" . $row['totalCategories'] . ")</a></li>";
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
    echo "<h1 id='mobilenavguyscolour'>Sort by Colour</h1>";
	echo "<div id='mobilenavguyscolourlist' class='colourswatchescontainer clearfix'>";
	
	$sql = "SELECT colour, COUNT(colour) AS totalColours FROM product WHERE (gender='male' OR gender='unisex') GROUP BY colour ASC";
    
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
        echo "<div class='colourswatchescontainer clearfix'>";
        echo "<ul class='list-group mobilenavcolourgroup'>";
    while ($row = mysqli_fetch_array($result)){        
        
        echo "<li class='colourswatches " . strtolower($row['colour']) . "'><a href='shop.php?colour=" . $row['colour'] . "&amp;gender=male'>" . $row['colour'] . " (" . $row['totalColours'] . ")" . "</a></li>";        
    }
        echo "</ul>";
        echo "</div>";
        echo "</div>";		
?>
<?php
//Sort by size
    echo "<h1 id='mobilenavguyssize'>Sort by Size</h1>";

	$sql = "SELECT size, COUNT(size) AS totalSizes FROM product WHERE (size IS NOT NULL AND gender='male' OR gender='unisex') GROUP BY size ASC";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    
	echo "<ul id='mobilenavguyssizelist'>";

    while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?size=" . $row['size'] . "&amp;gender=male'>" . $row['size'] . " (" . $row['totalSizes'] . ")" . "</a></li>";        
    }
	echo "</ul>";
?>
<?php
//Items on Sale
	$sql = "SELECT *, COUNT(onSale) AS totalOnSale FROM product WHERE (onSale IS NOT NULL) AND (gender='male' OR gender='unisex')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	    echo "<h1 id='mobilenavguyssale'>Items on Sale</h1>";
		echo "<ul id='mobilenavguyssalelist'>";

    while ($row = mysqli_fetch_array($result)){
        echo "<li><a href='shop.php?gender=male&onSale=yes'>On Sale (" . $row['totalOnSale'] . ")" . "</a></li>";                
    }
        echo "</ul>";
?>

        </div>
<!--END GUYS NAVIGATION -->















		
<?php
	if (isset($_SESSION['login'])){
        echo "<h1><a href='logout.php'>Logout</a></h1>";
		}
	if (!isset($_SESSION['login'])){
        echo "<h1><a href='loginform.php'>Login</a></h1>";
		}
?>		
        <h1><a href='contact.php'>Contact</a></h1>
        <h1><a href='about.php'>About</a></h1>




				</div>
			</div>
		</div>
	</div>
</div>




</body>
</html>