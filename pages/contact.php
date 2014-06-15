<?php
	session_start();
	$pagetitle = "Contact Us";
	//includes the header HTML
	include '../inc/header.php';
	include '../inc/nav.php';	
?>


<div class="topmargincontainer container">

    <div class='eight columns imagecolumn'>
        <img class='img-responsive' src='../images/contactphone.png'>
    </div>
    
    <div class='eight columns contactform'>
<?php
	if(isset($_SESSION['error']))
	{
		echo '<p class="searchfail">' . $_SESSION['error'] . '</p>'; // Display an error wrapped in a <p> tag with the class "error" 
		unset ($_SESSION['error']); //Unset session error
	}
?>

        <div class="formbox">	

	<h1 class='bigheading'>Contact</h1>
 <p>Have a comment or issue with your order? Want to tell us we're freaking awesome? Let us know...</p>
 
<p>Call us on 0468 353 777</p> 
<p>Email: karl.salisbury@gmail.com</p> 


<form action="contactprocessing.php" method="post"> 
	<input type="text" name="firstName" size="41" placeholder="First Name*" required /><br /> 
	<input type="text" name="lastName" size="41" placeholder="Last Name" /><br /> 
	<input type="email" name="email" size="41" placeholder="Email*" required /><br /> 
	<textarea rows="10" cols="30" name="feedback" placeholder="Feedback" ></textarea><br /> 
<p class="spaceTop"><input class='arrowbutton' type="submit" name="feedbackButton" value="Send Feedback" /></p> 



</form> 	
</div>	
	
	
	
	
	
	
	
	
	
</div>
</div>
<?php
	//includes the footer HTML
	include '../inc/footer.php';
?>