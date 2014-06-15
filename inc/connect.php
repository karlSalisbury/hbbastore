<?php
	$con= mysqli_connect( 'localhost', 'root', '', 'hbba');
		if(mysqli_connect_errno($con))
		{
			echo "Unable to connect to the server: " . mysqli_connect_error();
			exit();
		}
?>