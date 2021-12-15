<!-- checking for logedin or not -->
<?php 
session_start();
require "config/security.php" ;

?>


<!-- connect to database -->
<?php require "config/db.php" ;?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



<!-- Adding new products into database -->
<?php  
$msg = '';  
  if (isset($_POST['submit'])) {
    // Path to store the uploaded image
    $target = "upload/product/".basename($_FILES['image']['name']);
    
    // Get all the submitted datas from form
    $name = mysql_real_escape_string($_POST['name']);
    $qty = mysql_real_escape_string($_POST['qty']);
    $category = $_POST['category'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $price = mysql_real_escape_string($_POST['price']);
    $image = $_FILES['image']['name'];


    // Sql command to store data
    $sql = "INSERT INTO product (name, qty, category, status, description, price, image) VALUES ('$name', '$qty', '$category', '$status', '$description', '$price', '$image')";
    $run_query = mysqli_query($conn, $sql);

    // Moving uploaded image to targeted folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded succesfully";
    }else{
      $msg= "Image did not uploaded";
    }
    if ($run_query) {
      echo "<script>alert('Product Added Successfully!')</script>";
      echo "<script> location = 'productlist.php' </script>";
    }else{
      echo "<script>alert('Something Went Wrong!')</script>";
    }


  }
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name*</label>
                    </td>
                    <td>
                        <input name="name" type="text" placeholder="Enter Product Name..." class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Quantity*</label>
                    </td>
                    <td>
                        <input name="qty" type="number" placeholder="Enter Product Quantity" class="small" required />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category*</label>
                    </td>
                    <td>
                        <select id="select" name="category"  required >

                            <option>Select Category</option>
                            <!-- getting categories from database -->
                            <?php  
                                $csql = "SELECT * FROM category";
                                $run_csql = mysqli_query($conn, $csql);
                                while ($row = mysqli_fetch_array($run_csql)) {
                            ?>
                            
                            <option value="<?php echo $row['name'] ;?>"><?php echo $row['name'] ;?></option>

                        <?php } ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Status*</label>
                    </td>
                    <td>
                        <select id="select" name="status"  required >

                            <option>Select Status</option>
                            
                            <option value="featured">Featured</option>
                            <option value="new">New</option>
                            <option value="top-sale">Top Sale</option>
                            <option value="flash-sale">Flash Sale</option>
                            <option value="imported">Imported</option>

                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description*</label>
                    </td>
                    <td>
                        <textarea name="description" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price*</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Enter Price..." class="medium" required/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


