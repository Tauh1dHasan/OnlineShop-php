<?php 
    session_start() ;
    $uid = $_SESSION['uid'];
?>
<!-- connecting to the database -->
<?php require "config/db.php" ;?>



<!-- include head section -->
<?php require "include/head.php" ;?>



<body>
  <div class="wrap">
<!-- include header and navigation section -->
    <?php require "include/head_nav.php" ;?>




    <main id="main" role="main">
        <section id="checkout-container">
            <div class="container">

        <?php if (isset($_POST['submit']) && $_POST['method'] == 'bkash') : ?>
                <img style="margin-left: 25%;" width="60%;" src="images/bkash.jpg">
        <?php endif; ?>
                

                <div class="row py-5">
                    <div class="col-md-4 order-md-2 mb-4">

                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                        </h4>
                        <ul class="list-group mb-3">


                            <!-- Joinning cart and product tables  -->
                                
                            <?php
                                $sum = 0;  
                                    $sql = "SELECT * FROM product INNER JOIN cart ON cart.product_id = product.id AND cart.user_id = '$uid' ";
                                    $run_sql = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($run_sql)) {
                                        

                                        $total = ($row['price'] * $row['qty']) + ($row['price'] * $row['pre_qty']);
                                        $sum += $total;
                                ?>


                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $row['name'] ;?></h6>
                                    <small class="text-muted"><?php echo $row['description'] ;?></small>
                                </div>
                                <span class="text-muted"><?php echo $total ;?>/=</span>
                            </li>
                            <?php } ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (TAKA)</span>
                                <strong><?php echo $sum ;?>/=</strong>
                            </li>
                        </ul>

                    </div>


                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing Information</h4>
                        <form action="pre_invoice.php" method="post" class="needs-validation" novalidate>

                            <div class="mb-3">
                                <label for="name">Full Name
                                    <span class="text-muted">(Required)</span>
                                </label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter your full name" required>
                                
                            </div>

                            <div class="mb-3">
                                <label for="email">Email
                                    <span class="text-muted">(Required)</span>
                                </label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" required>
                                
                            </div>

                            <div class="mb-3">
                                <label for="mobile">Mobile
                                    <span class="text-muted">(Required)</span>
                                </label>
                                <input name="mobile" type="number" class="form-control" id="mobile" placeholder="Enter your valid mobile number" required>
                                
                            </div>

                            <div class="mb-3">
                                <label for="address">Address
                                    <span class="text-muted">(Required)</span>
                                </label>
                                <input name="address" type="text" class="form-control" id="address" placeholder="Enter the shipping address" required>
                            </div>

                    <?php if (isset($_POST['submit']) && $_POST['method'] == 'bkash') : ?>
                            <div class="mb-3">
                                <label for="trxid">Bkash TrxID
                                    <span class="text-muted">(Required)</span>
                                </label>
                                <input name="trxid" type="text" class="form-control" id="trxid" placeholder="Enter Bkash TrxID" required>
                                
                            </div>
                    <?php endif; ?>

                            <hr class="mb-4">

                            
                            <hr class="mb-4">
                            <input type="hidden" name="method" value="<?php echo $_POST['method'] ;?>">
                            <button name="submit" class="btn btn-primary btn-lg btn-block" type="submit">
                                Continue to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        
    </main>
    <!-- Footer -->
     <!-- include footer section -->
   <?php require "include/footer.php" ;?>

   

    <!-- include footer scripts -->
    <?php require "include/script.php" ;?>
</body>
</html>

