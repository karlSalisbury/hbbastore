<?php
	$pagetitle="Login";
?>
<?php
	session_start();
	include '../inc/connect.php';
?>
<?php
	//includes the header HTML
	include '../inc/header.php';
	include '../inc/nav.php';	
?>









<div class="topmargincontainer container">
<div class='eighteen columns'>
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
		<label>Username</label><br />
		<input type="text" name="username" /><br />
		<label>Password</label><br />
		<input type="password" name="password" /><br />
		<p><input class='arrowbutton' type="submit" name="login" value="login" /></p>
	</form>
    <p><a href="registration.php">Create a new account</a></p>
	</div>
</div>
</div>
<?php
	//includes the footer html
	include '../inc/footer.php';
?>