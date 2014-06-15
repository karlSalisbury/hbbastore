<?php
	session_start();
	$pagetitle = "Privacy Policy";
	//includes the header HTML
	include '../inc/header.php';
	include '../inc/nav.php';	
?>


<div class="topmargincontainer container">

    <div class='eight columns imagecolumn'>
        <img class='img-responsive' src='../images/privacypolicy.png'>
    </div>
    
    <div class='eight columns article'>

	<h1>Privacy Policy</h1>
	
	<h2>Collection of information</h2>
	<p>We will gather only the information required to conduct business with our clients.</p>

	<h2>Storage & Backup</h2>
	<p>Client information and creative assets (including contact and invoice information) will be stored on servers located on site, using password protection for sensitive data.
	Sensitive data will only be retained by the business for a period of time that it is deemed necessary to do so.

	<h2>Access & Usage</h2>
	<p>Financial data will only be available to relevant employees, such as accounts payable and the chief executive officer.</p>

	<h2>Third parties</h2>
	<p>Client information of any kind is not to be shared with third parties.
	Selling of client or business owned assets to third parties, such as images, data or written content is strictly forbidden.</p>

	<h2>Passwords</h2>
	<p>The minimum password length is 8 characters. Longer passwords using strings of random words are the preferred method to provide sufficient entropy instead of using capital letters, numbers or non-alphanumeric characters. See illustration from XKCD below.</p>	 
	
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