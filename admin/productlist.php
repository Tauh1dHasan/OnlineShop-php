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
					<th>Product name</th>
					<th>Image</th>
					<th>Description</th>
					<th>Qty</th>
					<th>Category</th>
					<th>Status</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<!-- Getting product informations from database -->
				<?php  
					$sql = "SELECT * FROM product";
					$run_sql = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($run_sql)) {
				?>



				<tr class="odd gradeX">
					<td><?php echo $row['id'] ;?></td>
					<td><?php echo $row['name'] ;?></td>
					<td><img style="width: 60px;" src="upload/product/<?php echo $row['image'] ;?>"></td>
					<td><?php echo $row['description'] ;?></td>
					<td><?php echo $row['qty'] ;?></td>
					<td><?php echo $row['category'] ;?></td>
					<td><?php echo $row['status'] ;?></td>
					<td><?php echo $row['price'] ;?></td>
					<td><a href="edit-product.php?id=<?php echo $row['id'] ;?>">Edit</a> || <a href="del-product.php?id=<?php echo $row['id'] ;?>">Delete</a></td>
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
