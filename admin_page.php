<?php
    session_start();
    require_once("database.php");
    if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['userName']) && (isset($_SESSION['userType']) == 'admin')){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>   
    <?php include 'admin_header.php'; ?>
    <section class="dashboard">
        <h1 class="heading">dashboard</h1>
        <div class="box-container">
            <div class="box">
                <?php
                    $pending = db()->query("SELECT price FROM `order` WHERE payment_status = 'pending'");
                    $num_row = mysqli_num_rows($pending);
                    $totalPendings = 0;
                    if($num_row > 0){
                        for($i=1; $i<=$num_row; $i++){
                            if($row = mysqli_fetch_array($pending)){
                                $price = $row['price'];
                                $totalPendings = $totalPendings + $price;
                            }
                        }
                    }else {
                        $totalPendings = 0;
                    }
                ?>
                <h3>$ <span><?php echo number_format($totalPendings) ?>/-</span></h3>
                <p>Total Pendings</p>
            </div>
        
            <div class="box">
                <?php
                    $completed = db()->query("SELECT price FROM `order` WHERE payment_status = 'completed'");
                    $num_row = mysqli_num_rows($completed);
                    $totalCompleteds = 0;
                    if($num_row > 0){
                        for($i=1; $i<=$num_row; $i++){
                            if($row = mysqli_fetch_array($completed)){
                                $price = $row['price'];
                                $totalCompleteds = $totalCompleteds + $price;
                            }
                        }
                    }else {
                        $totalCompleteds = 0;
                    }
                ?>
                <h3>$ <span><?php echo number_format($totalCompleteds) ?>/-</span></h3>
                <p>Completed Payments</p>
            </div>
        
            <div class="box">
                <?php
                    $orderPlaces = db()->query("SELECT * FROM `order`");
                    $num_row_orderPlaces = mysqli_num_rows($orderPlaces);
                ?>
                <h3> <span><?php echo $num_row_orderPlaces ?></span></h3>
                <p>Order Places</p>
            </div>
        
            <div class="box">
                <?php
                    $productAdded = db()->query("SELECT * FROM product");
                    $num_row_productAdded = mysqli_num_rows($productAdded);
                ?>
                <h3> <span><?php echo $num_row_productAdded ?></span></h3>
                <p>Products Added</p>
            </div>
        </div>
     
        <div class="box-container">
            <div class="box">
                <?php
                    $users = db()->query("SELECT * FROM users WHERE user_type = 'user'");
                    $num_row_users= mysqli_num_rows($users);
                ?>
                <h3> <span><?php echo $num_row_users ?></span></h3>
                <p>Normal Users</p>
            </div>

            <div class="box">
                <?php
                    $admins = db()->query("SELECT * FROM users WHERE user_type = 'admin'");
                    $num_row_admins= mysqli_num_rows($admins);
                ?>
                <h3> <span><?php echo $num_row_admins ?></span></h3>
                <p>Admin Users</p>
            </div>

            <div class="box">
                <?php
                    $totalAccounts = db()->query("SELECT * FROM users");
                    $num_row_totalAccounts= mysqli_num_rows($totalAccounts);
                ?>
                <h3> <span><?php echo $num_row_totalAccounts ?></span></h3>
                <p>Total Accounts</p>
            </div>
    
            <div class="box">
                <?php
                    $totalMessages = db()->query("SELECT * FROM saysomething");
                    $num_row_totalMessages= mysqli_num_rows($totalMessages);
                ?>
                <h3> <span><?php echo $num_row_totalMessages ?></span></h3>
                <p>New Messages</p>
            </div>
        </div>
    </section>

    <?php
        mysqli_close(db());
    ?>
    <!-- JS File Link -->
    <script src="js/admin_script.js"> </script>
</body>
</html>

<?php
}else {
    header("Location: signIn.php");
}
?>