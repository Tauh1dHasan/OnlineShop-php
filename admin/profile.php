<!-- checking for logedin or not -->
<?php 
session_start();
require "config/security.php" ;

?>


<!-- connect to database -->
<?php require "config/db.php" ;?>



<!-- Getting user informations in secure way -->
<?php
    $msg = '';

    if (isset($_POST['update'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $mdpass = md5($password);

        // sql query to insert datas into database
        $sql = "UPDATE admin SET id = 1, name = '$name', email = '$email', password = '$mdpass' ";
        $run_sql = mysqli_query($conn, $sql);
        if ($run_sql) {
            $msg = 'Profile informations updated';
        }else{
            $msg = 'Error Try again please';
        }
    }
?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Your Profile</h2>
        <div class="block">               
         <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
            <table class="form">
            <h2><?php echo $msg ;?></h2>					
                <tr>
                    <td>
                        <label>Name :</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Type your name" class="medium" required/>
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Email :</label>
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="type new email" class="medium" required />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Password :</label>
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="New password" class="medium" required />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="update" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>