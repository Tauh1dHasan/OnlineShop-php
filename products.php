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

	    	<div class="content_top">
	    		<div class="heading">
	    			<h3>All Our Products</h3>
	    		</div>
	    		<div class="clear"></div>
	    	</div>

		    <div class="section group row">

		    	<!-- Get new product informations from database -->
		      	<?php  
		      		$sql = "SELECT * FROM product ORDER BY id DESC";
		      		$run_sql = mysqli_query($conn, $sql);
		      		while ($row = mysqli_fetch_array($run_sql)) {
		      	?>

				<div style="margin-bottom: 15px;" class="col-3">
					 <a href="preview.php?id=<?php echo $row['id'] ;?>"><img height="200px" src="admin/upload/product/<?php echo $row['image'] ;?>" /></a>
					 <h2><?php echo $row['name'] ;?></h2>
					 <p><?php echo $row['description'] ;?></p>
					 <p><span class="price"><?php echo $row['price'] ;?></span></p>
				     <div class="button">
				     	<span>
				     		<a  href="preview.php?id=<?php echo $row['id'] ;?>" class="btn btn-primary details">Details</a>
				     	</span>
				     </div>
				</div>
				<hr>
				<?php } ?>
			</div>


<!-- Pagination system -->
<!--
			<nav style="margin: 10px auto" class="d-flex justify-content-center" aria-label="...">
			  	<ul class="pagination">
				    <li class="page-item">
				      <a class="page-link" href="#" tabindex="-1">Previous</a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item active">
				      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#">Next</a>
				    </li>
			  	</ul>
			</nav>
-->
	    </div>
	</div>
</div>
       <!-- include footer section -->
   <?php require "include/footer.php" ;?>

   

    <!-- include footer scripts -->
    <?php require "include/script.php" ;?>
</body>
</html>

