<!-- connecting to the database -->
<?php require "config/db.php" ;?>


<!-- include head section -->
<?php require "include/head.php" ;?>



<body>
<div class="wrap">
	<!-- include header and navigation section -->
	<?php require "include/head_nav.php" ;?>



	<div class="header_bottom">
		
<!-- FlexSlider -->
		<section class="slider">
		  <div class="flexslider">
			<ul class="slides">
				<li><img src="images/1.jpg" alt=""/></li>
				<li><img src="images/2.jpg" alt=""/></li>
				<li><img src="images/3.jpg" alt=""/></li>
				<li><img src="images/4.jpg" alt=""/></li>
		    </ul>
		  </div>
	  	</section>
<!-- FlexSlider -->

	  <div class="clear"></div>
  	</div>	

 <div class="main">
    <div class="content">






		<div class="content_top">
    		<div class="heading">
    		<h3>Top Sale Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

      	<div class="section group row">

      	<!-- Get top sale product informations from database -->
      	<?php  
      		$tsql = "SELECT * FROM product WHERE status = 'top-sale' ORDER BY id DESC LIMIT 4";
      		$run_tsql = mysqli_query($conn, $tsql);
      		while ($row = mysqli_fetch_array($run_tsql)) {
      	?>

			<div class="col-3">
				 <a href="preview.php?id=<?php echo $row['id'] ;?>"><img height="200px;" src="admin/upload/product/<?php echo $row['image'] ;?>" /></a>
				 <h2><?php echo $row['name'] ;?></h2>
				 <p><?php echo $row['description'] ;?></p>
				 <p><span class="price">Price:<?php echo $row['price'] ;?></span></p>
			     <div class="button">
			     	<span>
			     		<a class="btn btn-primary" href="preview.php?id=<?php echo $row['id'] ;?>" class="details">Details</a>
			     	</span>
			     </div>
			</div>
		<?php } ;?>


		<a style="float:left; margin: 10px auto;" href="status.php?status=top-sale ">
			<button class="btn btn-success">Show More</button>
		</a>


		</div>




    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

      	<div class="section group row">

      	<!-- Get featured product informations from database -->
      	<?php  
      		$fsql = "SELECT * FROM product WHERE status = 'featured' ORDER BY id DESC LIMIT 4";
      		$run_fsql = mysqli_query($conn, $fsql);
      		while ($row = mysqli_fetch_array($run_fsql)) {
      	?>

			<div class="col-3">
				 <a href="preview.php?id=<?php echo $row['id'] ;?>"><img height="200px;" src="admin/upload/product/<?php echo $row['image'] ;?>" /></a>
				 <h2><?php echo $row['name'] ;?></h2>
				 <p><?php echo $row['description'] ;?></p>
				 <p><span class="price">Price:<?php echo $row['price'] ;?></span></p>
			     <div class="button">
			     	<span>
			     		<a class="btn btn-primary" href="preview.php?id=<?php echo $row['id'] ;?>" class="details">Details</a>
			     	</span>
			     </div>
			</div>
		<?php } ;?>


		<a style="float:left; margin: 10px auto;" href="status.php?status=featured ">
			<button class="btn btn-success">Show More</button>
		</a>


		</div>



		<div class="content_bottom">
			<div class="heading">
			<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>

		<div class="section group row">

      	<!-- Get new product informations from database -->
      	<?php  
      		$nsql = "SELECT * FROM product WHERE status = 'new' ORDER BY id DESC LIMIT 4";
      		$run_nsql = mysqli_query($conn, $nsql);
      		while ($row = mysqli_fetch_array($run_nsql)) {
      	?>

			<div class="col-3">
				 <a href="preview.php?id=<?php echo $row['id'] ;?>"><img height="200px;" src="admin/upload/product/<?php echo $row['image'] ;?>" /></a>
				 <h2><?php echo $row['name'] ;?></h2>
				 <p><?php echo $row['description'] ;?></p>
				 <p><span class="price">Price:<?php echo $row['price'] ;?></span></p>
			     <div class="button">
			     	<span>
			     		<a class="btn btn-primary" href="preview.php?id=<?php echo $row['id'] ;?>" class="details">Details</a>
			     	</span>
			     </div>
			</div>
		<?php } ;?>


		<a style="float:left; margin: 10px auto;" href="status.php?status=new ">
			<button class="btn btn-success">Show More</button>
		</a>


		</div>






		<div class="content_bottom">
			<div class="heading">
			<h3>Flash sale</h3>
			</div>
			<div class="clear"></div>
		</div>

		<div class="section group row">

      	<!-- Get flash sale product informations from database -->
      	<?php  
      		$nsql = "SELECT * FROM product WHERE status = 'flash-sale' ORDER BY id DESC LIMIT 4";
      		$run_nsql = mysqli_query($conn, $nsql);
      		while ($row = mysqli_fetch_array($run_nsql)) {
      	?>

			<div class="col-3">
				 <a href="preview.php?id=<?php echo $row['id'] ;?>"><img height="200px;" src="admin/upload/product/<?php echo $row['image'] ;?>" /></a>
				 <h2><?php echo $row['name'] ;?></h2>
				 <p><?php echo $row['description'] ;?></p>
				 <p><span class="price">Price:<?php echo $row['price'] ;?></span></p>
			     <div class="button">
			     	<span>
			     		<a class="btn btn-primary" href="preview.php?id=<?php echo $row['id'] ;?>" class="details">Details</a>
			     	</span>
			     </div>
			</div>
		<?php } ;?>


		<a style="float:left; margin: 10px auto;" href="status.php?status=flash-sale ">
			<button class="btn btn-success">Show More</button>
		</a>



		</div>







		<div class="content_bottom">
			<div class="heading">
			<h3>Imported</h3>
			</div>
			<div class="clear"></div>
		</div>

		<div class="section group row">

      	<!-- Get imported product informations from database -->
      	<?php  
      		$nsql = "SELECT * FROM product WHERE status = 'imported' ORDER BY id DESC LIMIT 4";
      		$run_nsql = mysqli_query($conn, $nsql);
      		while ($row = mysqli_fetch_array($run_nsql)) {
      	?>

			<div class="col-3">
				 <a href="preview.php?id=<?php echo $row['id'] ;?>"><img height="200px;" src="admin/upload/product/<?php echo $row['image'] ;?>" /></a>
				 <h2><?php echo $row['name'] ;?></h2>
				 <p><?php echo $row['description'] ;?></p>
				 <p><span class="price">Price:<?php echo $row['price'] ;?></span></p>
			     <div class="button">
			     	<span>
			     		<a class="btn btn-primary" href="preview.php?id=<?php echo $row['id'] ;?>" class="details">Details</a>
			     	</span>
			     </div>
			</div>
		<?php } ;?>


		<a style="float:left; margin: 10px auto;" href="status.php?status=imported ">
			<button class="btn btn-success">Show More</button>
		</a>


		
		</div>









    </div>
 </div>
</div>
   <!-- include footer section -->
   <?php require "include/footer.php" ;?>

   

    <!-- include footer scripts -->
    <?php require "include/script.php" ;?>
    
</body>
</html>
