 <?php
    session_start();
    require_once("database.php");
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
        global $user_Id;
        if(isset($_SESSION['user_Id']) && $_SESSION['user_Id'] != 0){
            $user_Id = $_SESSION['user_Id'];
        }
 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <div class="order">
        <h2>place orders</h2>
        <?php
            $result = db()->query("SELECT * FROM `order` WHERE user_id = $user_Id");
            $num_row =  mysqli_num_rows($result);
            if($num_row >0){
                for($i=1; $i<=$num_row; $i++){
                    echo '<div class="show_orders">';
                    if($data = mysqli_fetch_array($result)) {
                        $placeOn = $data['place_on'];
                        $name = $data['name'];
                        $email = $data['email'];
                        $number = $data['number'];
                        $address = $data['address'];
                        $payment = $data['payment_method'];
                        $order = $data['order_pro'];
                        $price = $data['price'];
                        $status = $data['payment_status'];                     
        ?>          
                        <div class="yourOrder">
                            <p>Place on : <span> <?php echo $placeOn ?> </span> </p>
                            <p>Name : <span> <?php echo $name ?> </span> </p>
                            <p>Email : <span> <?php echo $email ?> </span> </p>
                            <p>Number : <span> <?php echo $number ?> </span> </p>
                            <p>Address : <span> <?php echo $address ?> </span> </p>
                            <p>Payment method : <span> <?php echo $payment ?> </span> </p>
                            <p id="orders">Your orders : <span> <?php echo $order ?> </span> </p>
                            <p>Your price : <span>$<?php echo $price ?>/- </span> </p>
                            <?php
                                if($status == 'completed'){
                                    echo '<p>Payment status : <span id="status" style="color: rgb(26, 95, 26)">'.$status.'</span> </p>';
                                }else {
                                    echo '<p>Payment status : <span id="status">'.$status.'</span> </p>';
                                }
                            ?>
                            
                        </div>
        <?php
                    } 
                    echo '</div>';
                }    
            }else {
                echo '<p class="deletedPara">Your cart is empty!</p>';
            }
            mysqli_close(db());
        ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
<?php
}else {
    header("Location: signIn.php");
}
?>