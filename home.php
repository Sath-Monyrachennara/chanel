<?php
    session_start();
    require_once("database.php");
    if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['userName'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <div class="home">
        <div class="image">
            <a href="home.php"><img src="https://i1.wp.com/popbee.com/image/2021/09/cc.jpg?quality=95&" alt="home_img"></a>
        </div>
        <a href="shop.php"> <button id="shop" class="shop">Shop Now</button> </a>
    </div>  

    <div class="about" id="about">
        <h2>About Us</h2>
        <p> <strong>Gabrielle Bonheur "Coco" Chanel</strong> (19 August 1883 – 10 January 1971) was a French
            fashion designer and businesswoman. The founder and namesake of the Chanel brand, she was credited
            in the post-World War I era with popularizing a sporty, casual chic as the feminine standard of
            style. This replaced the "corseted silhouette" that was dominant beforehand with a style that was
            simpler, far less time consuming to put on and remove, more comfortable, and less expensive, all
            without sacrificing elegance. She is the only fashion designer listed on Time magazine's list of the
            100 most influential people of the 20th century.
        </p>
        <a href="detail_about.php" id="details">Show more details <span> <i class="fa-solid fa-angles-right"></i> </span></a>
    </div>

    <div class="product" id="product">
        <h2>Our Gallery</h2>
        <div class="pro_img">
            <div class="modelImg">
                <div class="images">
                    <img src="https://www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_auto/w_642/prd-emea/sys-master/content/P1/h93/h41/9654374367262-Homepage_Fashion_ONE_Mobile(9).jpg"
                        alt="latest_pro1">
                </div>
                <div class="images">
                    <img src="https://i.zoomtventertainment.com/media/Jennie_13.jpg" alt="jennie_img1">
                </div>
                <div class="images">
                    <img src="https://lofficielthailand.com/wp-content/uploads/2020/07/CHANEL-04_0598-scaled.jpg"
                        alt="chBage">
                </div>
            </div>
            <div class="modelImg">
                <div class="images">
                    <img src="https://www.chanel.com/images/q_auto,f_auto,fl_lossy,dpr_auto/w_856/FSH-1646820456372-moblrd02.png"
                        alt="jennie_img3">
                </div>
                <div class="images">
                    <img src="https://lofficielthailand.com/wp-content/uploads/2020/07/CHANEL-04_0621-scaled.jpg"
                        alt="latest_pro2">
                </div>
                <div class="images">
                    <img src="https://lofficielthailand.com/wp-content/uploads/2020/07/CHANEL-04_0544-scaled.jpg"
                        alt="jennie_img2">
                </div>
            </div>
        </div>
        <div class="btn">
            <a href="gallery.php" id="ga_btn">See More </a>
        </div>       
    </div>

    <?php include 'designer.php'; ?>

    <?php include 'contactUs.php'; ?>

    <?php include 'footer.php'; ?>

    <!-- JS File Link -->
    <script src="js/script.js"></script>
    
</body>
</html>

<?php
}else {
    header("Location: signIn.php");
}
?>