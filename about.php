<!-- connecting to the database -->
<?php require "config/db.php" ;?>


<!-- include head section -->
<?php require "include/head.php" ;?>



<body>
  <div class="wrap">
		<!-- include header and navigation section -->
	<?php require "include/head_nav.php" ;?>




  <!-- Getting about us page text from database -->
  <?php  
    $sql = "SELECT * FROM update_page";
    $run_sql = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($run_sql);
  ?>



 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>About us heading</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p><?php echo $row['about'] ;?></p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
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

