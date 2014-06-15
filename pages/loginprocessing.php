<?php
	session_start();
	include '../inc/connect.php';
	 $_SESSION['userID'] = $row['userID'];
?>
<?php
	if (isset($_SESSION['error'])) //if session error is set
	{
		echo "<p class='error'>" . $_SESSION['error'] . '</p>'; //display error messages
		unset($_SESSION['error']); //Unset session error
	}
?>
<?php
	$username = mysqli_real_escape_string($con, $_POST['username']); //prevent SQL injection
	$password = mysqli_real_escape_string($con, $_POST['password']); //prevent SQL injection
	$password = hash('sha256', $password); //hash the password with the SHA256
	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	
	$row = mysqli_fetch_array($result); //create a variable called $row to store the results
	
	$count = mysqli_num_rows($result); //count the number of rows returned by the query
	//echo $sql;
	//echo $count;
	
		
	if ($count==1) //if the number of matching records equals 1
		{
			$_SESSION['login'] = $row['firstName']; //initialise a session called login to have a value of 'firstName'
			$_SESSION['userID'] = $row['userID'];
			echo $_SESSION['login'];
			echo $_SESSION['userID'];
			header('location:index.php'); //redirect to sesion 1
		}
		
	else
	{
			$_SESSION['error'] = "Incorrect Username or Password. Please try again."; //if an error occurs initialise a session called 'error' to have a value of the error msg
			header('location:loginform.php'); //redicret to login.php
	}
	mysqli_close($con);//close the database connection
	
?>