<!-- CSS File Link -->
<link rel="stylesheet" href="css/style.css">

<?php
    require_once("database.php");
    if(isset($_POST['input'])){
        $input = $_POST['input'];
    }

    $result = db()->query("SELECT * FROM product WHERE pro_name LIKE '{$input}%'");
    if(mysqli_num_rows($result) > 0){ 
        while($row = mysqli_fetch_assoc($result)){ 
            $name = $row['pro_name'];
            $price = $row['pro_price'];
            $image = $row['image'];
            $id = $row['id'];    
        ?>
            <div class="pro_item">
                <img src="productImages/<?php echo $image ?>" alt="Image1">
                <p class="pro_name" id="pro_name"><?php echo $name ?></p>
                <p class="price">Price: $<?php echo $price ?></p>
                <input type="number" min="0" class="pro_num" name="quanity" placeholder="0">
                                            
                <div class="button">
                    <button type="submit" id=<?php echo $id ?> class="add_cart">Add To Cart</button>
                    <a href="moreDetail.php?id=<?php echo $id ?>" class="pro_details" name="pro_details">More Details</a>
                </div>                                
            </div> 
    <?php
        }
    }else {
        echo '<p id="nodata">No data found!</p>';
    }

    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>     

    <script type="text/javascript">
        $(document).ready(function() {
           var  quantity;
           $(".pro_num").on('input', function(){
                quantity = $(this).val();
                console.log($quantity);
            });

            $(".add_cart").on('click', function(){
                var id = this.id;
                console.log(id);
                $.ajax({
                    url:"shoppingCart.php",
                    method:"post",
                    data:{id:id, quantity:quantity},
                    success:function(){
                        alert("Your product is added!!");
                    }
                });
            });

        });
    </script>