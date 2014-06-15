<?php 
 session_start(); 
 include "../inc/connect.php"; 
?>
<?php 
	$comment = mysqli_real_escape_string($con, $_POST['comment']); //prevent SQL injection 
	$blogID = $_POST['blogID']; //retrieve the blogID from the hidden form field 
	$authorID = $_SESSION['userID']; //retrieve the userID from the $_SESSION created when the user logged in 
 
	$sql = "INSERT INTO comment (blogID, authorID, datePosted, comment) VALUES('$blogID', '$authorID', NOW(), '$comment')"; //sql query 
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
	header("location:blogpost.php?blogID=" . $blogID); //redirect to the full blogpost page with the appropriate blogID 
?> 