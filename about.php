<?php
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>    

    <div class="about about_us">
        <h1>About Us</h1>
        <div class="row show_content">
            <div id="image"> <img src="https://www.chanel.com/emea/img/prd-emea/sys-master/content/P1/h37/hb4/9731534094366" alt="Aboutus_image"> </div>
            <div class="content">
                <h2 id="contact_heading">why choose us?</h2>
                <p>
                   CHANEL Connects, the arts & culture podcast, returns for Season 2, bringing together the most creative and innovative talent from film, art, dance, music and beyond to explore fresh ideas.
                   Some are old friends, others are meeting for the first time, but all are pioneering game changers across their industries.
                </p>
                <p>
                    Inspired by the heritage of the House to play a role in “what happens next”, and brought together by CHANEL Arts & Culture, CHANEL Connects Season 2 includes eight multi-chaptered episodes with legendary figures such as Maisie Williams, Grimes, Kehinde Wiley, Lil Buck, Honey Dijon, Anicka Yi, G-Dragon and Misan Harriman.
                </p>
                <div class="contactUs_btn">
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="row">
            <h2>client's reviews</h2>
            <div class="clientReviews">
                <div class="col">
                    <div class="clientImg"> <img src="clientImages/pic1.webp" alt="clientImage"> </div>
                    <p>Lorem ipsum dolor sit, It's good. I really like it!</p>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="name">Alley Doe</p>
                </div>

                <div class="col">
                    <div class="clientImg"> <img src="clientImages/pic2.webp" alt="clientImage"> </div>
                    <p>Lorem ipsum dolor sit, It's awesome. I really like it!</p>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="name">Mary Horry</p>
                </div>

                <div class="col">
                    <div class="clientImg"> <img src="clientImages/pic3.webp" alt="clientImage"> </div>
                    <p>Lorem ipsum dolor sit. The stylish is so beautiful!</p>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="name">Jin Yu</p>
                </div>
            </div>

            <div class="clientReviews">
                <div class="col">
                    <div class="clientImg"> <img src="clientImages/pic4.avif" alt="clientImage"> </div>
                    <p>Lorem ipsum dolor sit. The stylish is so beautiful!</p>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="name">Alex Jackson</p>
                </div>

                <div class="col">
                    <div class="clientImg"> <img src="clientImages/pic5.avif" alt="clientImage"> </div>
                    <p>Lorem ipsum dolor sit, It's awesome. I really like it!</p>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="name">Dive Skris</p>
                </div>

                <div class="col">
                    <div class="clientImg"> <img src="clientImages/pic6.jpg" alt="clientImage"> </div>
                    <p>Lorem ipsum dolor sit. The new items are released!</p>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="name">Jenny Gang</p>
                </div>
            </div>
        </div>
        
    </div>
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