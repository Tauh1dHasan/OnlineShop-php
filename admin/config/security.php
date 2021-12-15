<!-- checking for security informations -->
<?php 
	if (!isset($_SESSION['admin_email']) && !isset($_SESSION['admin_pass']) ) {
		echo "<script> location = 'login.php' </script>" ;
	}
?>