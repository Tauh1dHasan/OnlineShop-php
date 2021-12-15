<?php  
require "config/db.php";
	
	if (empty($_GET['id'])) {
		echo "<script> alert('Please select a product first!!!!!') </script>";
		echo "<script> location = 'order_list.php' </script>";
	}else{
		$pid = $_GET['id'];
		$sql = mysqli_query($conn, "UPDATE pro_order SET status = '2' WHERE pro_id = '$pid' ");
		echo "<script> location = 'order_list.php' </script>";
	}
?>