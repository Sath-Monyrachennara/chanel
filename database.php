<?php
    function db() {
        return new mysqli('localhost', 'root', '', 'chanel_db');
    }

    function updateData($value, $subTotal, $id){     
        return db()->query("UPDATE cart SET quantity = $value, sub_total = $subTotal WHERE id = $id");
    }

    function updateStatus($value, $id){
        return db()->query("UPDATE `order` SET payment_status = $value WHERE id = $id");
    }

    function deleteProduct($id){
        return db()->query("DELETE FROM cart WHERE id = $id");
    }

    function deleteAllproduct($user_Id){
        return db()->query("DELETE FROM cart WHERE user_id = $user_Id");
    }
?>
