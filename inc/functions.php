<?php
	function get_product_name($pid){//function to retrieve the product name
		global $con; //when using a custom function we need to give the database connection global scope (not just local)
		
		$sql = "SELECT name FROM product WHERE productID=$pid";
		$result = mysqli_query($con, $sql); //run the query
		$row = mysqli_fetch_array($result);
		return $row['name']; //the PHP return statement ends the current function and returns the argument

	}
	function get_product_image($pid){
		global $con; //When using a custom funcion we need to give the databse global scope (not just local)
		$sql = "SELECT image FROM product WHERE productID=$pid";
		$result = mysqli_query($con, $sql); //run the query
		$row = mysqli_fetch_array($result);
		return $row['image']; //the PHP return statement ends the current function and returns the argument
	}
 	function get_price($pid){ //function to retrieve the product price 
 		global $con; 
		$sql = "SELECT price FROM product WHERE productID=$pid"; 
		$result = mysqli_query($con, $sql); //run the query 
		$row = mysqli_fetch_array($result);
		return $row['price']; 
 	}
	function remove_product($pid){ //function to remove a product from the shopping cart 
		$pid=intval($pid); //returns the integer value of a variable 
		$max=count($_SESSION['cart']); 
			for($i=0;$i<$max;$i++){ 
				if($pid==$_SESSION['cart'][$i]['productID']){ //for each product return the productID 
					
					unset($_SESSION['cart'][$i]);
					break; 
		 		} 
		 }
		 $_SESSION['cart']=array_values($_SESSION['cart']); 
	} 

	function get_order_total(){//function to calculate the order total
			$max=count($_SESSION['cart']);
			$sum=0;//start with a total of zero
				for($i=0;$i<$max; $i++){
					$pid=$_SESSION['cart'][$i]['productID'];//for each product return the productID
					$q=$_SESSION['cart'][$i]['qty']; //for each product return the quantity
					$price=get_price($pid); //for each product return the price
					$sum+=$price*$q; //calculate the total price
				}
				return $sum;
	}

	function addtocart($pid, $q){//function to add a produc tot the shopping cart
		if($pid<1 or $q<1) return;
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productID']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productID']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
}
	function product_exists($pid){//function to determine if a product exists in the cart
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0; $i<$max; $i++){
			if($pid==$_SESSION['cart'][$i]['productID']){
			$flag=1;
			break;
			}
		}
		return $flag;
	}
?>