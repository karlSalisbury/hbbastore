<?php
	session_start();
	include '../inc/connect.php';
	
?>
<?php
	if (!isset($_SESSION['login']))
	{
		
		header('location:../pages/index.php'); //if the 'login' session is not set redirect to index.php
	}
?>