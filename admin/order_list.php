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
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Pro ID</th>
					<th>Pro Name</th>
					<th>Qty</th>
					<th>Pre Qty</th>
					<th>Total</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Method</th>
					<th>TrxID</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<!-- Getting product informations from database -->
				<?php  
					$sql = "SELECT * FROM pro_order WHERE status = '0' ";
					$run_sql = mysqli_query($conn, $sql);
					$count = 1;
					while ($row = mysqli_fetch_array($run_sql)) {
				?>



				<tr class="odd gradeX">
					<td><?php echo $count ;?></td>
					<td><?php echo $row['pro_id'] ;?></td>
					<td><?php echo $row['pro_name'] ;?></td>
					<td><?php echo $row['qty'] ;?></td>
					<td><?php echo $row['pre_qty'] ;?></td>
					<td><?php echo $row['total'] ;?></td>
					<td><?php echo $row['name'] ;?></td>
					<td><?php echo $row['phone'] ;?></td>
					<td><?php echo $row['address'] ;?></td>
					<td><?php echo $row['method'] ;?></td>
					<td><?php echo $row['trxid'] ;?></td>
					<td>
						<a href="deliver.php?id=<?php echo $row['pro_id'] ;?>">Deliver</a> || 
						<a href="reject.php?id=<?php echo $row['pro_id'] ;?>">Reject</a>
					</td>
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

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
