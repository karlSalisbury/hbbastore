<?php
	$pagetitle = "Shopping Cart";
	include '../inc/logincheck.php';
	include '../inc/functions.php';
	include '../inc/header.php';
	include '../inc/nav.php';


//if the $_REQUEST 'command' is delete then call the PHP remove_product function 
		if(isset($_REQUEST['command']) && $_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']); 
	}
 
//if the $_REQUEST 'command' is clear then unset the 'cart' session 
		else if(isset($_REQUEST['command']) && $_REQUEST['command']=='clear'){ 
		unset($_SESSION['cart']); 
	} 
//if the $_REQUEST 'command' is update then update the cart by the specified quantity 
		else if(isset($_REQUEST['command']) && $_REQUEST['command']=='update'){ 
			$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){ 
			$pid=$_SESSION['cart'][$i]['productID'];
			$q=intval($_REQUEST['product'.$pid]); 
		if($q>0 && $q<=999){ 
			$_SESSION['cart'][$i]['qty']=$q; 
		} 
	} 
}
	
?>


<script>
	function del(pid){
		if(confirm('Do you really mean to delete this item?')){
			document.cart.pid.value=pid;
			document.cart.command.value='delete';
			document.cart.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.cart.command.value='clear';
			document.cart.submit();
			}
		}
	function update_cart(){
		document.cart.command.value='update';
		document.cart.submit();
		}
</script>
	
	<form name="cart" method="post">
		
		<input type="hidden" name="pid" />
		<input type="hidden" name="command" />
		
		<div class="cart">
			<div>
			<div style="padding-bottom:10px">
			
			</div>
<div class='topmargincontainerfluid'>
				
				<h1 class='bigheading'>Your Shopping Cart</h1>
				
    
                <!---<a href="javascript:history.go(-1)">Continue Shopping</a>--->
				<!---<p><input type="button" value="Continue Shopping" onclick="window.location='shop.php'" /></p>--->
                
				<table class='carttable' style="width:100%">
				
					<?php
						if(isset($_SESSION['cart'])){
							echo '<tr class="tabledescriptions"><td>Product Name</td><td>Price</td><td >Qty</td><td>Subtotal</td><td>Options</td></tr>';
							$max=count($_SESSION['cart']);
							
							for($i=0; $i<$max; $i++){//for each product in the cart get the following
							
							$pid=$_SESSION['cart'][$i]['productID'];
							$q=$_SESSION['cart'][$i]['qty'];
							$pname=get_product_name($pid);
							
							if($q==0) continue;
							
					?>
							
							<tr class='productrow'>
							
							<td><?php echo $pname?></td>
							
							<td>$ <?php echo(number_format((get_price($pid)), 2, '.', ''))?></td> 
							<td><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" /></td>							
							<td>$ <?php echo(number_format((get_price($pid)*$q), 2, '.', ''))?></td> 
							<td><a href="javascript:del(<?=$pid?>)">Remove</a></td></tr> 
				
					<?php 
						} 
					?>
					<tr>
					<td  class="tableheading">Order Total: <strong class="ordertotal">AUD$<?php echo(number_format((get_order_total()), 2, '.', ''))?></strong></td>
					<td colspan="5" align="right">
					
					<input class='clearcartbutton' type="button" value="Clear Cart" onclick="clear_cart()">
					
					<input class='updatecartbutton' type="button" value="Update Cart" onclick="update_cart()">
					
					<input class='shopconfirmbutton' type="button" value="Checkout" onclick="window.location='shopconfirm.php'"></td>
					
					</tr>
					
					<?php
					}
					else{
						echo "<p class='searchfail'>There are no items in your shopping cart!</p>";
					}
					?>
					
				</table>
			</div>
		</div><!-- #cart -->
	</form>
    
</div>    
<?php
	include '../inc/footer.php';
?>