<?php
    session_start();
    require_once("database.php");
    global $grandTotal, $insert, $orderproName, $name, $email, $address, $number, $payment, $country, $user_Id;
    $grandTotal = 0;

    if(isset($_SESSION['user_Id'])){
        $user_Id = $_SESSION['user_Id'];
    }

    $subTotal = db()->query("SELECT sub_total FROM cart WHERE user_id = $user_Id");
    while($row = mysqli_fetch_array($subTotal)){
        $grandTotal = $grandTotal + $row['sub_total'];
    }

    if(isset($_POST['order_btn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'] ." ". $_POST['country'];
        $number = $_POST['number'];
        $payment = $_POST['payment'];
        $orderproName = $_POST['orderproName'];
    }

    $compare = db()->query("SELECT * FROM `order` WHERE user_id = $user_Id AND (payment_method = '$payment' OR price = '$grandTotal')");
    $num_row = mysqli_num_rows($compare);
    if($num_row > 0){
        
    }else {
        if($name != '' || $email != ''){
            $insertCheckout = db()->query("INSERT INTO `order`(user_id, name, email, number, address, payment_method, order_pro, price) 
            VALUES('$user_Id', '$name', '$email', '$number', '$address', '$payment', '$orderproName', '$grandTotal')");
            $insert = 1;
        }
    }

    if($insert == 1){
        $deletedPro = db()->query("DELETE FROM cart WHERE user_id = $user_Id");
        if($deletedPro == 1){
            $grandTotal = 0;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <div class="checkOut">
        <div class="buyPro">
            <?php
                $order = db()->query("SELECT pro_name, pro_price, quantity FROM cart WHERE user_id = $user_Id");
                $num_row = mysqli_num_rows($order);
                $orderproName = "";

                    if($num_row >0 ){
                        echo '<div class="prod">';
                        for($i=1; $i<= $num_row; $i++){
                            if($row = mysqli_fetch_array($order)){
                                $name = $row["pro_name"];
                                $price = $row["pro_price"];
                                $quantity = $row["quantity"];
                                $orderproName = $orderproName . $row['pro_name']." (" .$row['quantity']. ")" . " , ";
                                echo ' <p class="proName">'.$name.' <span class="price">($'.$price.'/- x </span> <span class="quantity">'.$quantity.')</span> </p> ';
                            }
                            if($i %3 == 0){
                                echo '</div>';
                                echo '<div class="prod">';
                            }
                        }
                        echo '</div>';
                    }else {
                        echo '<p class="deletedPara">Your cart is empty!</p>';
                    }
                mysqli_close(db());
            ?>  
        </div>

        <div class="grandTotal">
            <p class="total">Grand Total: <span class="subTotal">$<?php echo $grandTotal ?>/-</span> </p>
        </div>
            
        <div class="placeOrder">
            <h2>place your order</h2>
            <form action="checkout.php" method="post" autocomplete="off">
                <div class="col-1">
                    <div class="info">
                        <label for="name">Name: </label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" require>
                        <input type="text" id="orderproName" name="orderproName" style="display:none" value="<?php echo $orderproName ?>">
                    </div>
                    <div class="info">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" require>
                    </div>
                    <div class="info">
                        <label for="address">Address: </label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" require>
                    </div>
                </div>

                <div class="col-2">
                    <div class="info">
                        <label for="number">Number: </label>
                        <input type="number" id="number" name="number" placeholder="Enter your number" require>
                    </div>
                    <div class="info">
                        <label for="payment">Payment method: </label>
                        <select name="payment" id="payment" name="payment">
                            <option value="cash">Cash on delivery</option>
                            <option value="creditCard">Credit card</option>
                            <option value="paypal">Paypal</option>
                            <option value="aba">ABA</option>
                        </select>
                    </div>
                    <div class="info">
                        <label for="country">Country: </label>
                        <input type="text" id="country" name="country" placeholder="Enter your country" require>
                    </div>
                </div>
                <button type="submit" class="order_btn" name="order_btn">Order Now </button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JS File Link -->
    <script src="js/script.js"></script>

</body>
</html>