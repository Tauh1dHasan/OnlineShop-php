<!-- connect to database -->
<?php require "config/db.php" ;?>


<!-- Checking for login information -->
<?php  
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$mdpass = md5($password);

		// checking if login user matches into the database
		$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$mdpass'";
		$run_sql = mysqli_query($conn, $sql);
		if (mysqli_num_rows($run_sql) > 0) {
			session_start();
			$_SESSION['admin_email'] = $email;
			$_SESSION['admin_pass'] = $mdpass;
			echo "<script> alert('Welcome user') </script>";
			echo "<script> location = 'index.php' </script>";
		}else{
			echo "<script> alert('Your email or password did not matched') </script>";
			echo "<script> location = 'login.php' </script>";
		}
	}
?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Email" name="email" required/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="password" required/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>