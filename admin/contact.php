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
        $text = $_POST['text'];

        $sql = "UPDATE update_page SET id = 1, contact = '$text' ";
        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            $msg = 'Your contact text updated';
        }else{
            $msg = 'Something went wrong, please try again';
        }
    }
?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update contact us text</h2>
        <div class="block">
            <h3><?php echo $msg ;?></h3>               
            <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
                <div class="form-group">
                  <h3>Type your contact us page text here: </h3>
                  <textarea name="text" class="form-control" rows="5" id="comment" required></textarea>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>