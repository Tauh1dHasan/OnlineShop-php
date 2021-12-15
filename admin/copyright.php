<!-- checking for logedin or not -->
<?php 
session_start();
require "config/security.php" ;

?>


<!-- connect to database -->
<?php require "config/db.php" ;?>



<!-- Getting copyright company name -->
<?php
$msg = '';  
    if (isset($_POST['submit'])) {
        $copy = $_POST['copyright'];

        $sql = "UPDATE site_option SET copyright = '$copy'";
        $run_sql = mysqli_query($conn, $sql);
        if($run_sql){
            $msg = 'Copyright information updated';
        }else{
            $msg = 'Something went wrong, please try again';
        }
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <div class="block copyblock">
        <h3><?php echo $msg ;?></h3> 
         <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Enter Copyright Text..." name="copyright" class="large" required/>
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>