<!-- add to database -->
<?php  
	$conn = mysqli_connect('localhost','root','','shop');
	if (!$conn) {
		echo "Connection Failed : ";
		mysqli_connect_errno($conn);
	}
?>