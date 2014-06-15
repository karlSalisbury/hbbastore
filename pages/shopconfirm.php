<?php
	include '../inc/logincheck.php';
	$pagetitle= "Confirm Order";
	include "../inc/functions.php";//Functions for the shop
	include "../inc/connect.php";//Connection
	include "../inc/header.php";//Head tag HTML
	include "../inc/nav.php";//Navigation
?>

	<div class="header">
		<img src="" />
	</div>

<div class="topmargincontainerfluid">
<p class='warningmessage'>Please confirm your order</p>
<?php
	$sql = "SELECT firstName, lastName FROM user WHERE userID=" . $_SESSION['userID']; //retrieve the details for the logged in user
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));//run the query
	$row = mysqli_fetch_array($result); //save teh result in the $row variable
	echo "<h1 class='bigheading'> Order for: <strong>" . $row['firstName'] . " " . $row['lastName'] . "</strong></h1>"; //display the user name
?>

<table class='carttable' style="width: 100%">

<!-- the code could be improved by removing all the inline styling -->

	<?php
		if(isset($_SESSION['cart'])){
			echo '<tr class="tabledescriptions"><td>Image</td><td>Product Name</td><td>Price</td><td>Qty</td><td>Subtotal</td></tr>';
	$max=count($_SESSION['cart']);
	
	for($i=0;$i<$max;$i++){
		$pid=$_SESSION['cart'][$i]['productID'];//productID
		$q=$_SESSION['cart'][$i]['qty']; //Quantity
		$pname=get_product_name($pid); //Product Name
		if($q==0) continue;
		
	?>
	
	<tr> 
 <td><?php echo "<img src='" .(get_product_image($pid)) . "'" . " width=100 height=100 alt='product'" . " />"?></td> 
 <td><?php echo $pname ?></td> 
 <td>$ <?php echo(number_format((get_price($pid)), 2, '.', ''))?></td> 
 <td><?php echo $q ?></td> 
 <td>$ <?php echo(number_format((get_price($pid)*$q), 2,'.', ''))?></td> 
		
	<?php
		}
	?>
		
	<tr>

	<td class="tableheading" colspan="2">Order Total: <strong class="ordertotal">AUD$<?php echo(number_format((get_order_total()), 2, '.', ''))?></strong></td>
	
	<td colspan="5" style="text-align:right; padding:10px;">
	
	<form action="shopsuccess.php" method="post">
		
		<input type="hidden" name="command" />
		
		<input class='arrowbackbutton' type="button" value="Return to Cart" onclick="window.location='shoppingcart.php'">
		
		<input class='checkoutconfirmbutton' type="submit" name="confirmorder" value="Confirm Order" />
	</form>
	
	</td>
	
	</tr>
	
	<?php
		}
		else{
			echo "<tr><td>There are no items in your shopping cart!</td>"; 
		}
	?>
	
	</table>
	
	<p>*Free Shipping Australia wide</p>
	</div>
	<?php
		include '../inc/footer.php';
	?>
	
	
	
		
		
		
		
		
		
		