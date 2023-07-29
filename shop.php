<?php
    session_start();
    require_once("database.php");  
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){

?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>shop</title>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <!-- CSS File Link -->
     <link rel="stylesheet" href="css/style.css">
     <!-- Font awesome file link --> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

 </head>
 <body>
    <?php include 'header.php'; ?>
    <div class="shop">
        <h2>Latest Products</h2>
        <div class="latest_pro">
                <?php
                        $showPro = db()->query("SELECT * FROM product");
                        $x = 3;
                        while($x <= mysqli_num_rows($showPro)) {
                            echo '<div class="products">';
                            for($i=1; $i<4; $i++) {
                                if($row = mysqli_fetch_array($showPro)) {
                                    $name = $row['pro_name'];
                                    $price = $row['pro_price'];
                                    $image = $row['image'];
                                    $id = $row['id']; 
                                }        
                                echo '
                                        <div class="pro_item">
                                            <img src="productImages/'.$image.'" alt="Image1" > 
                                            <p class="pro_name" id="pro_name">'.$name.'</p>
                                            <p class="price">Price: $'.$price.'</p>
                                            <input type="number" min="1" class="pro_num" name="quanity" placeholder="1" >
                                            
                                            <div class="button">
                                                <button type="submit" id='.$id.' class="add_cart">Add To Cart</button>
                                                <a href="moreDetail.php?id='.$id.'" class="pro_details" name="pro_details">More Details</a>
                                            </div>
                                            
                                        </div>    
                                '; 
                            } 
                            echo '</div> ';
                            $x = $x + 3;
                        }
                    mysqli_close(db());
                ?> 
        </div>                  
    </div>

    <?php include 'footer.php'; ?>
                    
    <script type="text/javascript">
        $(document).ready(function(){
            var quantity=1, counter=0;
            
            $("input[name='quanity']").on('input', function(){
                quantity = $(this).val();
            });

            $(".add_cart").on("click", function(){
                var id = this.id;
                counter = counter + 1;
            //    console.log(counter);1
                $.ajax({
                    url:'shoppingCart.php',
                    method:'post',
                    data:{id:id, quantity:quantity},
                    success:function(){
                        alert("Product added!");
                        var totalCount;
                        var count = $(".header .icons #cart span").text();
                        if(count != counter){
                            totalCount = parseInt(count) + 1;
                        }else {
                            totalCount = counter;
                        }

                        $(".header .icons #cart span").html(totalCount);
                    }
                });    
               
            });
            
        }); 
    </script> 

 </body>
 </html>

<?php
}else {
    header("Location: signIn.php");
}
?>




