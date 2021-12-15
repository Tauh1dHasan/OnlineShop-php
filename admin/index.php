<!-- checking for logedin or not -->
<?php 
session_start();
require "config/security.php" ;

?>


<!-- connect to database -->
<?php require "config/db.php" ;?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel

					<div style="margin-left: 10px" class="row">

		<?php  
			$procount = mysqli_query($conn, "SELECT id FROM product");
			$prorow = mysqli_num_rows($procount);

		?>


						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#5c8000, #5c80004f);" class="col-md-3">
							<h4>Total Product</h4>
							<p style="font-size: 1.5em"><?= $prorow ;?></p>
						</div>


		<?php  
			$prodayorder = mysqli_query($conn, "SELECT id FROM pro_order WHERE `date` >= NOW()");
			$proorderrow = mysqli_num_rows($prodayorder);

		?>


						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#47196e, #47196e47);" class="col-md-3">
							<h4>Today Product Order</h4>
							<p style="font-size: 1.5em"><?= $proorderrow ;?></p>
						</div>

		<?php  
			$proweekorder = mysqli_query($conn, "SELECT id FROM pro_order WHERE `date` >= NOW() - INTERVAL 7 DAY");
			$proweekrow = mysqli_num_rows($proweekorder);

		?>


						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#a40312, #a4031242);" class="col-md-3">
							<h4>Last Week Product Order</h4>
							<p style="font-size: 1.5em"><?= $proweekrow ;?></p>
						</div>



		<?php  
			$promonthorder = mysqli_query($conn, "SELECT id FROM pro_order WHERE `date` >= NOW() - INTERVAL 30 DAY");
			$promonthrow = mysqli_num_rows($promonthorder);

		?>



						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#006280, #00628073);" class="col-md-3">
							<h4>Last Month Product Order</h4>
							<p style="font-size: 1.5em"><?= $promonthrow ;?></p>
						</div>



		<?php  
			$daysell = mysqli_query($conn, "SELECT price FROM pro_order WHERE `date` >= NOW()");
				$daysellamount = 0;
			while ($daysellrow = mysqli_fetch_assoc($daysell)) {
			    $daysellamount += $daysellrow['price']; 
			}

		?>
						

						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#5c8000, #5c80004f);" class="col-md-3">
							<h4>Today sell</h4>
							<p style="font-size: 1.5em">TK. <?= $daysellamount ;?></p>
						</div>

						
		<?php  
			$weeksell = mysqli_query($conn, "SELECT price FROM pro_order WHERE `date` >= NOW() - INTERVAL 7 DAY");
				$weeksellamount = 0;
			while ($weeksellrow = mysqli_fetch_assoc($weeksell)) {
			    $weeksellamount += $weeksellrow['price']; 
			}

		?>


						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#47196e, #47196e47);" class="col-md-3">
							<h4>Last Week Sell</h4>
							<p style="font-size: 1.5em">TK. <?= $weeksellamount ;?></p>
						</div>


		<?php  
			$monthsell = mysqli_query($conn, "SELECT price FROM pro_order WHERE `date` >= NOW() - INTERVAL 30 DAY");
				$monthsellamount = 0;
			while ($monthsellrow = mysqli_fetch_assoc($monthsell)) {
			    $monthsellamount += $monthsellrow['price']; 
			}

		?>



						<div style="padding:10px; margin:2px; color:white; background-image: linear-gradient(#a40312, #a4031242);" class="col-md-3">
							<h4>Last Month Sell</h4>
							<p style="font-size: 1.5em">TK. <?= $monthsellamount ;?></p>
						</div>



					</div>


                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>