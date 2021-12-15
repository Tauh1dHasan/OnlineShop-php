<?php session_start(); ;?>
<!-- connecting to the database -->
<?php require "config/db.php" ;?>


<!-- include head section -->
<?php require "include/head.php" ;?>


<body>
  <div class="wrap">
				<!-- include header and navigation section -->
	<?php require "include/head_nav.php" ;?>


<!-- Create user account registration system -->
<?php  
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		$mdpass = md5($password);

		$sql = "INSERT INTO user(name, email, mobile, address, password) VALUES ('$name','$email','$mobile','$address','$mdpass')";
		$run_sql = mysqli_query($conn, $sql);
		if ($run_sql) {
			echo "<script> alert('Registration complete, Now you can login!') </script>";
			echo "<script> location = 'login.php' </script>";
		}else{
			echo "<script> alert('Something is wrong, Please try again!') </script>";
		}
	}
?>


<!-- User login system -->
<?php  
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mdpass = md5($password);
		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$mdpass'";
		$run_sql = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($run_sql);
		if (mysqli_num_rows($run_sql) > 0) {
			
			$_SESSION['umail'] = $email;
			$_SESSION['upass'] = $mdpass;
			$_SESSION['uid'] = $row['id'];
			echo "<script> alert('Login successful') </script>";
			echo "<script> location = 'index.php' </script>";
		}else{
			echo "<script> alert('User email or password did not matched') </script>";
			echo "<script> location = 'login.php' </script>";
		}
	}
?>


<div class="main">
    <div class="content">

    	<div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>

        	<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" id="member">
            	<input name="email" type="email" placeholder="Email" class="field" required>
                <input name="password" type="password" placeholder="Password" class="field" required>
                <input type="submit" name="login" value="login" class="btn btn-success">
            </form>
        </div>


    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
	   			<table>
	   				<tbody>
						<tr>
							<td>
								<div>
									<input name="name" type="text" placeholder="Name" required>
								</div>
							
								<div>
									<input name="email" type="text" placeholder="E-Mail" required>
								</div>
		    			 				    				
								<div>
									<input name="address" type="text" placeholder="Address">
								</div>        
							</td>
							<td>
				           		<div>
				          			<input name="mobile" type="text" placeholder="Mobile">
				          		</div>
						  
						  		<div>
									<input name="password" type="password" placeholder="Password" required>
								</div>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<div>
									<input class="btn btn-success" name="register" type="submit" value="Register">
								</div>
							</td>
			    		</tr>
		    		</tbody>
				</table> 
		    	<div class="clear"></div>
		    </form>
    	</div>  	
       	<div class="clear"></div>
    </div>
</div>
</div>

   <!-- include footer section -->
   <?php require "include/footer.php" ;?>

   

    <!-- include footer scripts -->
    <?php require "include/script.php" ;?>
</body>
</html>

