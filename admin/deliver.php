<?php  
require "config/db.php";
	
	if (empty($_GET['id'])) {
		echo "<script> alert('Please select a product first!!!!!') </script>";
		echo "<script> location = 'order_list.php' </script>";
	}else{
		$pid = $_GET['id'];
// counting product quantity
		$prosql = mysqli_query($conn, "SELECT qty FROM product WHERE id = '$pid' ");
		$fetchpro = mysqli_fetch_assoc($prosql);
		$proqty = $fetchpro['qty'];
// counting order quantity
		$ordrsql = mysqli_query($conn, "SELECT qty FROM pro_order WHERE pro_id = '$pid' ");
		$fetchordr = mysqli_fetch_assoc($ordrsql);
		$ordrqty = $fetchordr['qty'];
// updating product quantity
		$countqty = $proqty - $ordrqty;
		$proqtysql = mysqli_query($conn, "UPDATE product SET qty = '$countqty' WHERE id = '$pid' ");
// updating product order status
		$sql = mysqli_query($conn, "UPDATE pro_order SET status = '1' WHERE pro_id = '$pid' ");

		echo "proquantity : $proqty <br> order quantity: $ordrqty <br> remainning quantity: $countqty";

		echo "<script> location = 'order_list.php' </script>";
	}
?>