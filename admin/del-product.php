<?php 
session_start();
require "config/security.php" ;

?>


<!-- connect to database -->
<?php require "config/db.php" ;

if (!empty($_GET['id'])) {
        $id = mysqli_escape_string($conn, $_GET['id']);

        $sql = mysqli_query($conn, "DELETE FROM product WHERE id = '$id' ");

        echo "<script> location = 'productlist.php' </script>";
    }



?>