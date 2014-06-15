<?php
	session_start(); //Start a session
	include "../inc/connect.php"; //Connect to the database

?>
<?php
	$firstName = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastname']);
	$userName = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	
	if (strlen($password) < 8)
	{
		$_SESSION['error'] = 'Password must be 8 Characters long';
		header("location:registration.php"); //Redirect back to Registration.php
		exit();
	}

	$password = hash('sha256', $password);//Encrypt the password with sha 256
	
	$sql = "SELECT * FROM user WHERE username='$userName'";
	$result = mysqli_query($con, $sql) or die (mysqli_error($con));//Run the query
	$numrow = mysqli_num_rows($result); //Count how many rows are returned
	
	if ($numrow > 0) //if count is > 0
	{
		$_SESSION['error'] = 'Username taken, try a different username'; //If a username already exists initialise an error with this message
		header('location:registration.php');//redirect to registration.php
		exit();
	}
	elseif ($firstName == "" || $lastName == "" || $userName == "" || $password == "") // Check if all input fields contain data
	{
		$_SESSION['error'] = 'All fields are required.'; // If an error occurs initialise a session called error
		header("location:registration.php"); //redirect back to registration.php
		exit();
	}
	else
	{
		$sql="INSERT INTO user (firstname, lastname, username, password, email) VALUES('$firstName', '$lastName', '$userName', '$password', '$email')";
		$result = mysqli_query($con, $sql) or die(mysqli_error($con));
		$_SESSION['success'] = 'You successfully created a new account. Please Login'; //if registration is successful initialise a sessoin called success with message
		
		header("location:index.php");//redirect back to index.php
		exit();
	}
	 mysqli_close($con); // close the database connection 	
?>