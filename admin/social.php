<!-- checking for logedin or not -->
<?php 
session_start();
require "config/security.php" ;

?>

<!-- connect to database -->
<?php require "config/db.php" ;?>


<!-- Getting social media links -->
<?php
$msg = '';  
    if (isset($_POST['submit'])) {
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $googleplus = $_POST['googleplus'];

        $sql = "UPDATE site_option SET facebook = '$facebook', twitter = '$twitter', google = '$googleplus'";
        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            $msg = 'Your social media links updated';
        }else{
            $msg = 'Something went wrong, please try again';
        }
    }
?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">
        <h3><?php echo $msg ;?></h3>               
         <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" placeholder="Facebook link.." class="medium" required />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" placeholder="Twitter link.." class="medium" required  />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="googleplus" placeholder="Google Plus link.." class="medium" required  />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
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