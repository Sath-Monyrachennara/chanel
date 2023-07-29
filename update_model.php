<?php
    require_once('database.php');
    global $id, $quantity, $updateQty, $price, $updateSubTotal;
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $quantity = $_POST['updateQty'];
    }

    $selectPrice = db()->query("SELECT * FROM cart WHERE id = $id");
    if(mysqli_num_rows($selectPrice) >0){
        if($row = mysqli_fetch_array($selectPrice)){
            $price = $row['pro_price'];
            $updateSubTotal = $quantity * $price;
        }
    }
        
    $updateQty = updateData($quantity, $updateSubTotal, $id);

    if($updateQty == 1){
        header('location: shoppingCart.php');
    }
?>