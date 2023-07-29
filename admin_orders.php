<?php
    session_start();
    require_once("database.php");
    global $id, $status, $deletedId;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $status = $_POST['status'];
    }
    $updateStatus = db()->query("UPDATE `order` SET `payment_status` = '$status' WHERE `id` = '$id'");
    
    if(isset($_GET['id'])){
        $deletedId = $_GET['id'];
    }
    $deletedOrder = db()->query("DELETE FROM `order` WHERE `id` = '$deletedId'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <div class="orders">
        <h1 class="heading">placed orders</h1>
        <div class="showOrder">
            <?php
                $result = db()->query("SELECT * FROM `order`");
                $num_row = mysqli_num_rows($result);
                global $status;
                if($num_row >0 ){
                    echo '<div class="result">';
                    for($i=1 ; $i<= $num_row; $i++){
                        if($row = mysqli_fetch_array($result)){
                            $placeOn = $row['place_on'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $number = $row['number'];
                            $address = $row['address'];
                            $payment = $row['payment_method'];
                            $order = $row['order_pro'];
                            $price = $row['price'];
                            $user_Id = $row['user_id'];
                            $id = $row['id'];
                            $status = $row['payment_status'];
            ?>
                        <div class="showResult">
                            <p>User id : <span class="userId"><?php echo $user_Id ?></span> </p>
                            <p>Place on : <span class="placeOn"><?php echo $placeOn ?> </span> </p>
                            <p>Name : <span class="name"><?php echo $name ?></span> </p>
                            <p>Number : <span class="number"><?php echo $number ?></span> </p>
                            <p>Email : <span class="email"><?php echo $email ?></span> </p>
                            <p>Address : <span class="address"><?php echo $address ?></span> </p>
                            <p>Total products : <span class="total_pro"><?php echo $order ?></span> </p>
                            <p>Total price : <span class="total_price">$<?php echo $price ?>/-</span> </p>
                            <p>Payment method : <span class="payment_method"><?php echo $payment ?></span> </p>

                            <form action="admin_orders.php" name="payment_method">
                                <select>
                                    <option value="" disabled selected><?php echo $status ?></option>
                                    <option value="pending">pending</option>
                                    <option value="completed">completed</option>
                                </select>

                                <a href="" id=<?php echo $id ?> class="update_btn">Update</a>
                                <a href="" id=<?php echo $id ?> class="delete_btn">Delete</a>
                            </form>

                        </div>
            <?php
                        }
                        if($i %3 == 0){
                            echo '</div>';
                            echo '<div class="result">';
                        }
                    }
                    echo '</div>'; 
                }
                mysqli_close(db());
            ?>
            
        </div>
    </div>

    <!-- 
    <script src="js/admin_script.js"> </script>
            -->

    <script type="text/javascript">
        $(document).ready(function(){
            var status;
            $("select").on("change", function(){
                status = this.value;
            });

            $(".update_btn").on("click", function(){
                var id = this.id;
                $.ajax({
                    url:'admin_orders.php',
                    method:'post',
                    data:{id:id, status:status},
                    success:function(){
                        alert("Order updated.");
                    }
                });
            });

            $(".delete_btn").on("click", function(){
                var id = this.id;
                $.ajax({
                    url:'admin_orders.php',
                    method:'get',
                    data:{id:id},
                    success:function(){
                        alert("Order deleted.");
                    }
                });
            });

        });
    </script>

</body>
</html>