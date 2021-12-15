<?php
session_start();

	if (!isset($_SESSION['umail']) && !isset($_SESSION['upass'])) {
	  	echo "<script> alert('Please login first') </script>";
	  	echo "<script> location = 'login.php' </script>";
	}else{
		require "config/db.php";
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			
			$sql = "DELETE FROM cart WHERE id = '$id' ";
			$run_sql = mysqli_query($conn, $sql);
			if ($run_sql) {
				echo "<script> location = 'cart.php' </script>";
			}else{
				echo "<script> alert('Can not delete from cart, Please try again!') </script>";
			}
		}
	}
?>