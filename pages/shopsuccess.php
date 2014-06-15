<?php
	include '../inc/logincheck.php';
	$pagetitle = "Successful Purchase"; 
	include '../inc/connect.php';
	include '../inc/header.php'; //contains session_start()
	include '../inc/nav.php'; //include the nav
?>
  
<?php 
	if(isset($_REQUEST['command']) && $_REQUEST['command']==''){ //if the $_REQUEST variable has a value of 'command' do the following 
 
	$userID=$_SESSION['userID']; //get the userID stored in the userID session 
	$sql = "INSERT INTO invoice (userID, dateTime) VALUES('$userID', NOW())"; //insert data into the invoice table 
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
 
	$invoiceID=mysqli_insert_id($con); //retrieve the last generated automatic ID 
 
		$max=count($_SESSION['cart']); 
			for($i=0;$i<$max;$i++){ 
			$pid=$_SESSION['cart'][$i]['productID']; // for each product retrieve the productID
			$q=$_SESSION['cart'][$i]['qty']; //for each product retrieve the quantity 
 
			$sql = "INSERT into product_invoice (invoiceID, productID, quantity) VALUES('$invoiceID', '$pid', '$q')"; //insert data into the product_invoice table 
			$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
 } 
 
 unset($_SESSION['cart']); //unset the 'cart' session when the order is completed 
 
 } 
 
		$sql= "SELECT * FROM invoice WHERE invoiceID =" . $invoiceID; //query to select the invoiceID 
		$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
 
		$row = mysqli_fetch_array($result); // store the result in the variable $row and in the code below display the invoiceID that is stored in the $row variable 
		
?> 

	<div class="topmargincontainerfluid">
	<div class='twelve columns'>
	<p class="searchsuccess">Success!</p>
	<h1 class='bigheading'>Your Order Invoice #<?php echo $row['invoiceID'] ?> Has Been Processed!</h1> 
		<p>Your order has been successfully processed. You will receive your product within 10 working days.</p> 
		<p><em>Thank you for shopping with has Beens Begin Again</em></p> 
	</div>
	</div>
<?php 
 include '../inc/footer.php'; 
?> 