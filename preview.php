<?php
	session_start() ;
	if (empty($_SESSION['umail'])) {
		
	}else{
		$useremail = $_SESSION['umail'];
	}
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
	    	<div class="section group">
				<div class="cont-desc row">

				<!-- Fetching single product from database -->
				<?php
					if (!empty($_GET['id'])) {
						$pid = $_GET['id'];
					  	$sql = "SELECT * FROM product WHERE id = '$pid' ";
						$run_sql = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($run_sql);
					  } 
				?>


					<div class="grid col-4">
						<img src="admin/upload/product/<?php echo $row['image'] ;?>" />
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $row['name'] ;?></h2>
						<p><?php echo $row['description'] ;?></p>				
						<p>Stock: <span style="color:red;"><?php echo $row['qty'] ;?></span></p>				
						<div class="price">
							<p>Price: <span><?php echo $row['price'] ;?></span></p>
							<p>Category: <span><?php echo $row['category'] ;?></span></p>
						</div>
						<div class="add-cart">
							<form action="addcart.php?id=<?php echo $_GET['id'] ;?>" method="post">
								<label for="retail">Retail sale:</label>
								<input id="retail" type="number" name="qty" min="1" max="5" placeholder="quantity"><br>

								<label for="pre_order">Pre Order sale:</label>
								<input id="pre_order" type="number" name="pre_qty" placeholder="Whole sale"> <br>


								<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
							</form>

						</div>
					</div>
				</div>
	 		</div>
	 	</div>

		<hr>

		<div class="content">
			<div class="row section group">
				<div style="float: left; margin: 0 auto;" class="col-8">
					<h3>Your feedback:</h3>
					<form action="feedbackfun.php" method="post">

					  <div class="form-group">
					  	<label for="name">Type your name: </label>
					  	<input class="form-control" type="text" id="name" name="name" required>
					  </div>

					  <div class="form-group">
					    <label for="comment">Your comment: </label>
					    <textarea class="form-control" id="comment" rows="3" name="comment" required>
					    	
					    </textarea>
					  </div>

					  <div class="form-group">
					  	<input type="hidden" name="email" value="<?php echo $useremail ;?>">
					  	<input type="hidden" name="pro_id" value="<?php echo $pid ;?>">
					  	<input class="btn btn-success" name="submit" type="submit" value="submit">
					  </div>

					</form>
				</div>
			</div>
		</div>



		<div class="content">
			<div class="row section group">
				<div style="float: left; margin: 0 auto;" class="col-8">
					<h3>Customer's feedback:</h3>
					<table class="table table-striped">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th colspan="2" scope="col">Comment</th>
					      <th scope="col">Date</th>
					    </tr>
					  </thead>
					  <tbody>
<?php  
	$comsql = mysqli_query($conn, "SELECT * FROM feedback WHERE pro_id = '$pid' ");
	$count = 1;
	while ($comrow = mysqli_fetch_assoc($comsql)) {
?>
					    <tr>
					      <th scope="row"><?= $count ;?></th>
					      <td><?= $comrow['name'] ;?></td>
					      <td colspan="2"><?= $comrow['comment'] ;?></td>
					      <td><?= $comrow['date'] ;?></td>
					    </tr>
<?php  
	$count++;
}
?>
					  </tbody>
					</table>
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

