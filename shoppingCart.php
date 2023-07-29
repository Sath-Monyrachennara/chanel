<?php
    session_start();
    require_once("database.php"); 
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){

    global $id, $quantity, $name, $price, $image, $subTotal, $email, $user_Id ;

    if(isset($_SESSION['user_Id'])){
        $user_Id = $_SESSION['user_Id'];
    }
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];  
        $quantity = $_POST['quantity']; 
        echo $id;
    }

 //   echo (empty($id) ? 'true' : 'false');
    $selectData = db()->query("SELECT * FROM `product` WHERE `id` = '$id'");
    $num_row = mysqli_num_rows($selectData);
    if($num_row >0){
        for($i=1; $i<=$num_row; $i++){
            if($rows = mysqli_fetch_array($selectData)) {
                $name = $rows['pro_name'];
                $price = $rows['pro_price'];
                $image = $rows['image'];
                $subTotal = $quantity * $price;
            }
            if(!empty($rows)) {
                $insertData = db()->query("INSERT INTO cart(user_id, pro_name, pro_price, quantity, sub_total, image) VALUES('$user_Id', '$name', '$price', '$quantity', '$subTotal', '$image')");
            }
        } 
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="shoppingCart">
        <h2>Products Added</h2>
        <div class="shopPro">
        <?php
            $data = db()->query("SELECT * FROM cart WHERE user_id = $user_Id");
            $total = 0;

                if(mysqli_num_rows($data) >0 ){
                    $num_row = mysqli_num_rows($data);
                    echo '<div class="pro">';
                    for($i=1; $i<= $num_row; $i++){
                        if($row = mysqli_fetch_array($data)){
                            $image = $row['image'];
                            $name = $row['pro_name'];
                            $price = $row['pro_price'];
                            $quantity = $row['quantity'];
                            $subTotal = $row['sub_total']; 
                            $id = $row['id'];
                    ?>
                            <div class="proAdd">
                                <a href="delete_model.php?id=<?php echo $id ?>" id="exit"> <i class="fa-solid fa-xmark exit"></i> </a>
                                <img src="productImages/<?php echo $image ?>" alt="img1" class="picture">
                                <p class="name"><?php echo $name ?></p>
                                <p class="price">$<span id=<?php echo $id ?>><?php echo $price?></span>/-</p>
                                <input type="number" value=<?php echo $quantity ?> name="quantity" class="proNumber" >
                                <button type="submit" id=<?php echo $id ?> class="update_btn">Update</button>
                                <p class="subTotal">Sub Total:  $<span id=<?php echo $id ?>><?php echo $subTotal?></span>/-</p>
                            </div>
            <?php
                            $total = $total + $subTotal;
                            if($i %3 == 0){ 
                                echo '</div>';
                                echo '<div class="pro">';
                            }
                        }
                    }
                    echo '</div>'; 
                }else {
                    echo '<p class="deletedPara">Your cart is empty!</p>';
                }
                mysqli_close(db());
            ?>
        </div>
        
        <a href="delete_model.php?user_id= <?php echo $user_Id ?>" class="deleteAll_btn" id="deleteAll_btn">Delete All</a>       
        <div class="showTotal">
            <p class="grandTotal">Grand Total: <span class="total">$<?php echo $total ?>/-</span> </p>
            <a href="shop.php"> <button class="continuceShop_btn">Continuce Shopping</button> </a>
            <a href="checkout.php"> <button class="checkOut_btn" id="checkOut_btn">Proceed To Checkout</button> </a>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JS File Link -->
    <script src="js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var updateQty;

            $("input[name='quantity']").on('change', function(){
                updateQty = $(this).val();
            });

            $(".update_btn").on('click', function(){
                var id = this.id;
                $.ajax({
                    url:'update_model.php',
                    method:'post',
                    data:{id:id, updateQty:updateQty},
                    success:function(){
                        alert("Product updated!");
                        var update_subTotal;
                        var price = $(".price #" + id ).text();
            
                    //    update_subTotal = parseInt(price) * updateQty;

                    }
                });
            });
            /* Has error with ajax to json data */

        });
    </script>

    <!-- JS File Link -->
    <script src="js/script.js"></script>
</body>
</html>

<?php
}else {
    header("Location: signIn.php");
}
?>