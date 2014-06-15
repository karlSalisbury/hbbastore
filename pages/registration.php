<?php
	session_start();
	$pagetitle = "Create an account";
	//includes the header HTML
	include '../inc/header.php';
	include '../inc/nav.php';	
?>


<div class="topmargincontainer container">

    <div class='eight columns imagecolumn'>
        <img class='img-responsive' src='../images/registrationimage.png'>
    </div>
    
    <div class='eight columns'>
<?php
	if(isset($_SESSION['error']))
	{
		echo '<p class="searchfail">' . $_SESSION['error'] . '</p>'; // Display an error wrapped in a <p> tag with the class "error" 
		unset ($_SESSION['error']); //Unset session error
	}
?>

	<h1 class='bigheading'>Register a new account</h1>
        <div class="formbox">	
            <form action="registrationprocessing.php" method="post">
                <!--<label>First Name <span class="required">*</span></label>-->
                <input type="text" name="firstname" placeholder="First Name" required /><br />
                <!--<label>Last Name <span class="required">*</span></label>-->
                <input type="text" name="lastname" placeholder="Last Name" required /><br />
                <!--<label>User Name <span class="required">*</span></label>-->
                <input type="text" name="username" placeholder="Preferred Username" required /><br />			
                <!--<label>Email <span class="required">*</span></label>-->
                <input type="text" name="email" placeholder="Email" required /><br />			
                <!--<label>Password <span class="required">*</span></label>-->
                <input type="password" name="password" placeholder="Password" required /><br />
                <p><input class='arrowbutton' type="submit" name="registration" value="Create New Account"/></p>
            </form>
            <p>All fields are required</p>
        </div>
    </div>
</div>


<?php
	//includes the footer HTML
	include '../inc/footer.php';
?>