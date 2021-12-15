<?php require "./config/db.php"; ?>

<div class="header_top">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt="" /></a>
		</div>
		<div class="header_top_right">
			<div class="search_box">
				<form action="search.php" method="get">
					<input name="search" type="text" placeholder="Search for Products">
					<input name="submit" type="submit" value="SEARCH">
				</form>
			</div>
			<a href="cart.php" title="View my shopping cart" rel="nofollow">
				<div class="shopping_cart">
					<div class="cart">
						
						<span class="cart_title">Cart</span>			
					</div>
				</div>
			</a>
			<div class="login"><a href="login.php">Login</a></div>
			<div class="login"><a href="logout.php">Logout</a></div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="menu">
		<ul id="dc_mega-menu-orange" class="dc_mm-orange">
		  <li><a href="index.php">Home</a></li>
		  <li><a href="products.php">Products</a> </li>
		  <li><a href="#">Top Categories</a>
			<ul>
<?php
$sql = mysqli_query($conn, "SELECT name FROM category");
	while ($row = mysqli_fetch_assoc($sql)) {
?>
				<a href="category.php?name=<?php echo $row['name'] ;?>" style="color: black; height: 25px;">
					<li><?php echo $row['name'] ;?></li>
				</a><hr>
<?php } ?>
			</ul>
		  </li>
		  <li><a href="cart.php">Cart</a></li>
		  <li><a href="about.php">About us</a> </li>
		  <li><a href="contact.php">Contact</a> </li>
		  <div class="clear"></div>
		</ul>
	</div>