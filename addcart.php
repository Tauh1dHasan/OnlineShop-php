<?php
session_start();
require "config/db.php";

	if (empty($_SESSION['umail']) && empty($_SESSION['upass'])) {
	  	echo "<script> alert('Please login first') </script>";
	  	echo "<script> location = 'login.php' </script>";
	}else{
		

		if (!empty($_GET['id'])) {
			$uid = $_SESSION['uid'];
			$pid = $_GET['id'];
			$usr_sql = "SELECT * FROM user WHERE id = '$uid'";
			$usr_sql_run = mysqli_query($conn, $usr_sql);
			$usr_fetch = mysqli_fetch_assoc($usr_sql_run);
			$uname = $usr_fetch['name'];

			echo "uid: $uid <br> pid: $pid <br> uname: $uname";

			if (isset($_POST['submit'])) {
				$qty = mysqli_escape_string($conn, $_POST['qty']);
				$pre_qty = mysqli_escape_string($conn, $_POST['pre_qty']);
				if (empty($qty)) {
					$qty = 0;
				}
				if (empty($pre_qty)) {
					$pre_qty = 0;
				}
				$run_sql = mysqli_query($conn, "INSERT INTO cart (user_id, user_name, product_id, qty, pre_qty) VALUES ('$uid', '$uname', '$pid', '$qty', '$pre_qty') ");

				echo "qty: $qty <br> pre_qty: $pre_qty<br>";

				if ($run_sql) {
					echo "<script> location = 'cart.php' </script>";
				}else{
					echo "<script> alert('Can not add to cart, Please try again!') </script>";
					echo "<script> location = 'index.php' </script>";
				}
			}
		}
	}
?>