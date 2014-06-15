<?php
	session_start();
	$pagetitle = "About us";
	//includes the header HTML
	include '../inc/header.php';
	include '../inc/nav.php';	
?>


<div class="topmargincontainer container">

    <div class='eight columns imagecolumn'>
        <img class='img-responsive' src='../images/shoegraphic.png'>
    </div>
    
    <div class='eight columns article'>


	<h1>Frequenty asked questions</h1>
	
	<h2>Who we are</h2>
	<p>We are an online retailer operating out of Sunny Brisbane, Australia.</p>
	
	<h2>What do you do?</h2>
	<p>We sell Vintage &amp; Pre-Loved clothing, most of our items are one of a kind.</p>
	
	<h2>I have another question...</h2>
	<p>We have a page for that, head over to our <a href='contact.php'>contact</a> page.</p>


	 
	</div>	
</div>

<!---<div class="topmargincontainer container">
    <div class='eight columns'>
		<h1 class='bigheading'>History</h1>
		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
		
		<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
	</div>

    <div class='eight columns imagecolumn'>
        <img class='img-responsive' src='../images/girlsshirtgraphic.png'>
    </div>
	
</div>--->


<?php
	//includes the footer HTML
	include '../inc/footer.php';
?>