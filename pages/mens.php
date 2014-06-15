
<?php
    $pagegender = $_GET['gender'];
    include '../inc/shopheader.php';
    include '../inc/shopsidebar.php';
    include '../inc/shopbody.php';
?>    
<?php    
    //Category Query
if(isset($_GET['category'])){
    	$sql = "SELECT * FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex') AND category ='" . strtolower ($_GET['category']) . "'";
    echo "<div class='product two-thirds column'><h1>Showing all Mens " . $_GET['category'] . "</h1></div>";    
}
else{
	$sql = "SELECT * FROM product WHERE (gender='" . $pagegender . "' OR gender='unisex')";    
}

    include '../inc/shopfooter.php';
?>