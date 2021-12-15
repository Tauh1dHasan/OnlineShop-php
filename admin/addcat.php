<!-- checking for logedin or not -->
<?php 
session_start();
require "config/security.php" ;

?>


<!-- connect to database -->
<?php require "config/db.php" ;?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<!-- Get submitted data into database -->
<?php
$msg = '';  
    if (isset($_POST['submit'])) {
        $catname = mysqli_real_escape_string($conn, $_POST['catname']);

        $sql = "INSERT INTO category (name) VALUES ('$catname')";
        $run_sql = mysqli_query($conn, $sql);
        if ($run_sql) {
            $msg = 'New category added';
        }else{
            $msg = 'Try again';
        }
    }
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                <h3><?php echo $msg ;?></h3> 
                 <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input name="catname" type="text" placeholder="Enter Category Name..." class="medium" required />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>