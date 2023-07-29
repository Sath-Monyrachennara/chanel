<?php
    // It isnt ready yet!! 
    session_start();
    require_once("database.php");
    global $id, $pro_image, $proDetailImg;

    /* Upload information and file from form */
    global $proPrice ,$proName, $proImg, $proDetail, $proDesc, $proimg_name, $num_row_DetailImg, $fileName, $fileName_tmp, $newproName, $detail_folder;
    global $num_rows, $comproName;
    if(isset($_POST['addProduct_btn'])){
        $proName = $_POST['pro_name'];
        $proPrice = $_POST['pro_price'];
        $proimg_name = $_POST['proimg_name'];
        $proImg = $_FILES['productImg']; /* Product Images */
        $proDetail = $_POST['proDetail'];
        $proDesc= $_POST['proDesc'];
    }

    $proPrice = (int) $proPrice;
    $extension = array('webp','jpg','jpeg');
    $random = rand(1,100);
    /* Detail Images */
    if(!empty($_FILES['productImg'])){
        $rows = db()->query("SELECT * FROM product");
        $num_rows = mysqli_num_rows($rows) + 1;
        $detail_folder = 'detailImg'. $num_rows;
        $detail_folder = (string) $detail_folder;
        $productImg = db()->query("SELECT * FROM product WHERE proDetail_img = '$detail_folder'");
        $contRow = mysqli_num_rows($productImg);
        if($contRow <= 0){
            mkdir("images/$detail_folder", true);
        }

        $target_dir_detailImg = 'images/'.$detail_folder .'/';
        $num_img = count($proImg['name']);
        /* Detail Images */
        for($i=0; $i<$num_img; $i++){
            $fileName = $_FILES['productImg']['name'][$i];
            $fileName_tmp = $_FILES['productImg']['tmp_name'][$i];
            $extensionDetimg = pathinfo($_FILES['productImg']['name'][$i], PATHINFO_EXTENSION);
            
            if($fileName == $proimg_name){
                $target_dir = "images/";
                $newproName = "pic".date('d').$random.'.'.$extensionDetimg;
                $target_file = $target_dir . basename($newproName);
                if(in_array($extensionDetimg, $extension)){
                    if(!file_exists($target_file)){
                        move_uploaded_file($fileName_tmp, $target_file);
                    }
                }
            }
            
            $newfileName = 'detailImg'.date('d').$random.$i.'.'.$extensionDetimg;
            $target_file_detail = $target_dir_detailImg . basename($newfileName);
            if(in_array($extensionDetimg, $extension)){
                if(!file_exists($target_file_detail)) {
                    move_uploaded_file($fileName_tmp, $target_file_detail);
                }else {
                    // echo '<script>alert("Your product image file type isn\'t allowed!");</script>';
                }   
            }      
        }    
        $filePath = "images/$newproName";
        $destinationFilePath = "images/$detail_folder/$newproName";
        if(copy($filePath, $destinationFilePath)){
           // echo 'Yes it copy!!';
        }
    }  
     
    if(isset($_POST['addProduct_btn'])){
        $result = db()->query("INSERT INTO `product`(`pro_name`, `pro_price`, `detail`, `description`, `image`, `proDetail_img`) 
                VALUES ('$proName','$proPrice','$proDetail','$proDesc','$newproName','$detail_folder')");
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <section class="products">
        <h1 class="heading">shop products</h1>
        <div class="addProducts">
            <h2>add product</h2>
            <form action="admin_products.php" method="post" enctype="multipart/form-data">
                <div class="pro_col">
                    <input type="text" id="pro_name" name="pro_name" placeholder="Enter product name" required>
                    <input type="text" id="pro_price" name="pro_price" placeholder="Enter product price" required>
                    <input type="text" id="proimg_name" name="proimg_name" placeholder="Enter product image name" required>
                    <label for="proimg_name" id="proimg_name">Pro_img name</label>
                </div>

                <div class="pro_col col2">
                    <input type="text" id="pro_color" name="pro_color" placeholder="Enter product color" required>
                    <input type="text" id="pro_dimensions" name="pro_dimensions" placeholder="Enter product dimensions" required>
                    <input type="file" value="No file chosen" id="productImg" name="productImg[]" multiple required>
                    <label for="productImg">Product Images</label>
                </div>
                
                <button class="addProduct_btn" name="addProduct_btn">Add Product</button>
            </form>
        </div>

        <div class="showPro">
            <?php
                $result = db()->query("SELECT * FROM product");
                $num_row = mysqli_num_rows($result);
                echo '<div class="Pro">';
                for($i=1; $i<=$num_row; $i++){
                    if($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $name = $row['pro_name'];
                        $price = $row['pro_price'];
                        $image = $row['image'];  
            ?>
                        <div class="pro_item">
                            <img src="productImages/<?php echo $image ?>" alt="img1" class="picture">
                            <p class="name"><?php echo $name ?></p>
                            <p class="price">$<?php echo $price ?>/-</p>
                            <button type="submit" id="<?php echo $id ?>" class="update_btn">Update</button>
                            <button type="submit" id="<?php echo $id ?>" class="delete_btn">Delete</button>
                            <a class="exit">
                                <i class="fa-solid fa-xmark" id="<?php echo $id ?>"></i>
                            </a>
                        </div>
            <?php
                    }
                    if($i%3 == 0){
                        echo '</div>';
                        echo '<div class="Pro">';
                    }
                }
                echo '</div>';
                mysqli_close(db());
            ?>
        </div>      
    </section>

    <!-- JS File Link -->
    <script src="js/admin_script.js"> </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var DetailImg;
            $(".delete_btn").on("click", function(){
                var id = this.id;
                $.ajax({
                    url:'admin_products.php',
                    method:'post',
                    data:{id:id},
                    success:function(){
                        alert("Product deleted.");
                    }
                });
            });

            $(".exit i").on("click", function(){
                var id = this.id;
                $.ajax({
                    url:'admin_products.php',
                    method:'post',
                    data:{id:id},
                    success:function(){
                        alert("Product deleted.");
                    }
                });
            });

        });

        $("#proDetail_img").on("input", function(){
            DetailImg = this.val();
        });

        $("#updateImg_btn").on("click", function(){
            $.ajax({
                url:'admin_products.php',
                method:'post',
                data:{DetailImg:DetailImg},
                success: function(){
                    alert("Your product image is uploaded!");
                }
            });
        });
    </script>

</body>
</html>