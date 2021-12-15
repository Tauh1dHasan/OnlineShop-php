<?php 
    session_start() ;
    $uid = $_SESSION['uid'];
?>
<!-- connecting to the database -->
<?php require "config/db.php" ;?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>




<style type="text/css">
@media print{
    .header_top, .menu, .footer, .btn, p {
        display:none;
    }
    
}
</style>
</head>



<body>
  <div class="wrap">
<!-- include header and navigation section -->
    <?php require "include/head_nav.php" ;?>




<!-- Getting data from checkout page -->
<?php
  $pro_sql = mysqli_query($conn, "SELECT name, email, phone, address FROM pro_order WHERE user_id = '$uid' ");
  $usr_row = mysqli_fetch_assoc($pro_sql);

  $name = $usr_row['name'];
  $email = $usr_row['email'];
  $mobile = $usr_row['phone'];
  $address = $usr_row['address'];

?>



    <section>
        <div style="float: left; margin-bottom: 25px;" class="logo">
            <img src="images/logo.png">
            <h4 style="font-size: 50px;" >Invoice</h4>
        </div>
        <div style="float: right; margin-bottom: 25px;">
            <ul>
                <li>Name:  <?php echo $name ;?>  </li>
                <li>Email:  <?php echo $email ;?>  </li>
                <li>Mobile:  <?php echo $mobile ;?>  </li>
                <li>Address:  <?php echo $address ;?>  </li>
            </ul>
        </div>
    




        <table class="table table-striped">
          <thead>

            <tr>
              <th><b>#</b></th>
              <th><b>Product</b></th>
              <th><b>Price</b></th>
              <th><b>Qty</b></th>
              <th><b>Total</b></th>
            </tr>

          </thead>
          <tbody>

            <!-- Joinning cart and product tables  -->
                
            <?php
            $sum = 0;  
                $sql = "SELECT * FROM product INNER JOIN cart ON cart.product_id = product.id AND cart.user_id = '$uid' ";
                $run_sql = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($run_sql)) {
                  $total = ($row['price'] * $row['qty']) + ($row['price'] * $row['pre_qty']);
                  $sum += $total;
            ?>

            <tr>
              <th scope="row"><?php echo $count ;?></th>
              <td><?php echo $row['name'] ;?></td>
              <td><?php echo $row['price'] ;?>/=</td>
              <td><?php echo $row['qty'] ;?></td>
              <td><?php echo $total ;?></td>
            </tr>
        <?php
        $count++;
         } 
        ?>
          </tbody>
          <tfoot>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <th><b>Total: <?php echo $sum ;?>/=</b></th>
              </tr>
          </tfoot>
        </table>

        <div class="row">
            <div class="col-2">
                <a href="javascript:window.print()">
                    <button class="btn btn-primary">Print()</button>
                </a>
            </div>
        </div>
    
    </section>

    <!-- Footer -->
     <!-- include footer section -->
   <?php require "include/footer.php" ;?>

    <!-- include footer scripts -->
    <?php require "include/script.php" ;?>





<?php
  $sql = mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$uid' ");
?>
</body>
</html>
