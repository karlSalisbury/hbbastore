<?php 
	session_start(); 
	include "../inc/connect.php"; 
?> 
<?php 
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']); //prevent SQL injection 
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']); 
	$email = mysqli_real_escape_string($con, $_POST['email']); 
	$feedback = mysqli_real_escape_string($con, $_POST['feedback']); 
 
	$sql = "INSERT INTO feedback (firstName,lastName, email, feedback, dateTime) VALUES ('$firstName', '$lastName', '$email', '$feedback', NOW())"; //sql query 
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
	
	$_SESSION['success'] = 'Thank you for your feedback, we will be in contact with you shortly'; //if Successful redirect to index.php
		
	header("location:index.php");//redirect back to index.php
	exit();
?>