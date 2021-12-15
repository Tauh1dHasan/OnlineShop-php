<?php 
	session_start() ;
	if (empty($_SESSION['uid'])) {
		echo "<script> alert('Please login first...') </script>";
		echo "<script> location = 'login.php' </script>";
	}
	$uid = $_SESSION['uid'];
?>
<!-- connecting to the database -->
<?php require "config/db.php" ;?>



<!-- include head section -->
<?php require "include/head.php" ;?>



<body>
  <div class="wrap">
<!-- include header and navigation section -->
	<?php require "include/head_nav.php" ;?>


	

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<thead>
								<tr>
									<th width="20%">Product Name</th>
									<th width="10%">Image</th>
									<th width="5%">Qty</th>
									<th width="5%">Pre Order Qty</th>
									<th width="10%">Price</th>
									<th width="10%">Total</th>
									<th width="5%">Action</th>
								</tr>
							</thead>
							<tbody>

								<!-- Joinning cart and product tables  -->
								
								<?php
								$sum = 0;  
									$sql = "SELECT * FROM product INNER JOIN cart ON cart.product_id = product.id AND cart.user_id = '$uid' ";
									$run_sql = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($run_sql)) {
										
										$total = ($row['price'] * $row['qty']) + ($row['price'] * $row['pre_qty']);
										$sum += $total;
								?>


								<tr>
									<td><?php echo $row['name'] ;?></td>
									<td>
										<img src="admin/upload/product/<?php echo $row['image'] ;?>"/>
									</td>
									<td><?php echo $row['qty'] ;?></td>
									<td><?php echo $row['pre_qty'] ;?></td>
									<td><?php echo $row['price'] . "/=" ;?></td>
									<td><?php echo $total . "/=" ;?></td>
									<td><a href="delcart.php?id=<?php echo $row['id'] ;?>">X</a></td>
								</tr>

								<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>Total: <?php echo $sum . "/=";?></td>
								</tr>

							</tbody>
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="products.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">

							<form action="checkout.php" method="post">

								<label for="bkash"> Bkash: 
									<input id="bkash" type="radio" name="method" value="bkash" required>
								</label>
									<br>
								<label for="cod"> Cash On Delivary: 
									<input id="cod" type="radio" name="method" value="cod" required>
								</label>

								<button name="submit" type="submit">
									<img src="images/check.png">
								</button>

							</form>

						</div>
					</div>
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

