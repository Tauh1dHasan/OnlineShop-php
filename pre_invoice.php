<?php 
    session_start() ;
    $uid = $_SESSION['uid'];

    require "config/db.php" ;
  
    if (isset($_POST['submit'])) {
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $method = $_POST['method'];
        $trxid = $_POST['trxid'];

    }

         // Joinning cart and product tables
                
            
            $sum = 0;  
                $sql = "SELECT * FROM product INNER JOIN cart ON cart.product_id = product.id AND cart.user_id = '$uid' ";
                $run_sql = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_array($run_sql)) {
					

                    $total = ($row['price'] * $row['qty']) + ($row['price'] * $row['pre_qty']);
                    $sum += $total;


					$pid = $row['product_id'];
					$pname = $row['name'];
					$qty = $row['qty'];
                    $pre_qty = $row['pre_qty'];
					$pro_price = $row['price'];
					// function to insert product order information into database
					$ordr_sql = "INSERT INTO pro_order (name, user_id, email, phone, pro_id, pro_name, qty, pre_qty, price, method, total, trxid, address, status) VALUES ('$name', '$uid', '$email', '$mobile', '$pid', '$pname', '$qty', '$pre_qty', '$pro_price', '$method', '$total', '$trxid', '$address', '0')";

					$run_ordr_sql = mysqli_query($conn, $ordr_sql);


        
					$count++;

                    if ($run_ordr_sql) {
                        $totalProductCount = $qty + $pre_qty;
                        $product_id_number = $pid;

                        $product_stock = mysqli_query($conn, "SELECT qty FROM product WHERE id = '$product_id_number' ");
                        $product_stock_row = mysqli_fetch_assoc($product_stock);
                        $current_stock = $product_stock_row['qty'] - $totalProductCount;


                        $adjuststock = mysqli_query($conn, "UPDATE product SET qty = '$current_stock' WHERE id = '$product_id_number' ");
                    }
				} 
         echo "<script> location = 'invoice.php' </script>";
?>


