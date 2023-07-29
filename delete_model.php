<?php
    require_once("database.php");
    $id = $_GET['id'];
    $user_Id = $_GET['user_id'];
    
    $isDeleted = deleteProduct($id);
    // Deleted 1 product 
    if($isDeleted == 1){
        header('location: shoppingCart.php');
        alert("Your product is deleted!!");
    }

    $deleteAll = deleteAllproduct($user_Id);
    
    if($deleteAll == 1){
        header('location: shoppingCart.php');
    } 
?>