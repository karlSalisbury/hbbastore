<section class='headernavigation'>	
<div class='accountinfobar clearfix'>
	<div class='useravatar'>
<?php
//Show different login messages

        if (!isset($_SESSION['login'])){
            echo "<p class='loggedinas'><a href='index.php' /><img id='homeicon' src='../images/homeicon.png' /></a><a class='mobilenavicon' href='#' /><img src='../images/mobilenavmenuicon.png' /></a>You are not logged in</p>";
        }
		// Show login message only when logged in
        if (isset($_SESSION['login'])){
            echo "<p class='loggedinas'><a href='index.php' /><img id='homeicon' src='../images/homeicon.png' /></a><a class='mobilenavicon' href='#' /><img src='../images/mobilenavmenuicon.png' /></a> Welcome " . $_SESSION['login'] . "</p>";
            //echo "<p class='loggedinas'><a class='mobilenavicon' href='#' /><img src='../images/mobilenavmenuicon.png' /></a>You are not logged in</p>";                        
        }		
?>            
    </div>
	<div class='accountbuttons'>	
	<ul>
<?php		
if(!isset($_SESSION['login'])){
    echo "<a class='loginbutton' href='#' /><li class='loginbuttonsmall'>Login</li></a>";
	echo "<a href='registration.php' /><li class='createaccountbuttonsmall'>Create Account</li></a>";
}
else{
    echo "<a href='logout.php' /><li class='logoutbuttonsmall'>Logout</li></a>";		
}
?>
<?php
if(isset($_SESSION['login'])){
		echo "<a href='shoppingcart.php' /><li class='checkoutbuttonsmall'>My Cart</li></a>";
}
?>

		<a href='contact.php' /><li class='contactbuttonsmall'>Contact</li></a>
		<a href='about.php' /><li class='aboutbuttonsmall'>FAQ</li></a>		
	</ul>
	</div>
</div>

<div class='mainnavigation clearfix'>
	<a href='index.php' /><img id='sitelogo' src="../images/hbbalogo.png" /></a>
	<h1 id='sitetagline'>Vintage &amp; Pre-Loved Clothing</h1>

	<div class='navbuttons'>
		<ul>
			<a class='searchbutton' href='#' /><li class='searchicon'>Search</li></a>			
			<a href='shop.php?gender=male' /><li>Guys</li></a>
			<a href='shop.php?gender=female' /><li>Girls</li></a>
			<!--<a class='sale' href='onsale.php' /><li>Sale</li></a>-->	
		</ul>
	</div>
</div>
</section>

        
    



<!-- Small Pop down menu using Jquery -->    

<!---<div class="smallheader">
	<div>
	<ul>
		<li><span class="smallheaderhome"><a href="welcome.php" title='Welcome page'>Home</a></span></li>
		<li><span class="smallheaderwork"><a href="shoppingcart.php" title='View cart contents'>View Cart</a></span></li>
		<li><span class="smallheaderwork"><a href="shop.php" title='Buy cool stuff'>Ministore</a></span></li>
		<li><span class="smallheaderwork"><a href="blog.php" title='Read the blog'>Blog</a></span></li>
		<li><span class="smallheaderwork"><a href="sessionindex.php" title='View the session pages'>Sessions</a></span></li>        
	</ul>
        
		</form>

	</div>
</div>--->


<div id='searchbar'>
		<form action="search.php" method="get">
			<input type="text" id='tags' name="search" placeholder="Enter a search term" />
			<input type="submit" name="submit" value="GO!" />
		</form>
</div>















