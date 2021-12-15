<?php
session_start();

require "config/db.php";


	if (isset($_POST['submit']) && !empty($_SESSION['umail'])) {

		$pid = mysqli_escape_string($conn, $_POST['pro_id']);
		$name = mysqli_escape_string($conn, $_POST['name']);
		$email = mysqli_escape_string($conn, $_POST['email']);
		$comment = mysqli_escape_string($conn, $_POST['comment']);

		$sql = mysqli_query($conn, "INSERT INTO feedback (pro_id, name, email, comment) VALUES ('$pid', '$name', '$email', '$comment') ");

		header('location:' . $_SERVER['HTTP_REFERER']);

	}else{
		echo "<script> alert('Please login first') </script>";
		echo "<script> location = 'login.php' </script>";
	}
?>