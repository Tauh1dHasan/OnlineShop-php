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
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!-- Getting category list from database -->
						<?php  
							$sql = "SELECT * FROM category";
							$run_sql = mysqli_query($conn, $sql);

							while ($row = mysqli_fetch_array($run_sql)) {
						?>
						<tr class="odd gradeX">
							<td><?php echo $row['id'] ;?></td>
							<td><?php echo $row['name'] ;?></td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
						</tr>
						<?php } ?>
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

