<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>   
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    
    <div class=" gallery swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="show_img swiper-slide"> 
                <img src="https://www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_auto/w_642/prd-emea/sys-master/content/P1/h93/h41/9654374367262-Homepage_Fashion_ONE_Mobile(9).jpg"
                    alt="latest_pro1"> 
            </div>
            <div class="show_img swiper-slide">
                <img src="https://i.zoomtventertainment.com/media/Jennie_13.jpg" alt="jennie_img1">
            </div>
            <div class="show_img swiper-slide">
                <img src="https://lofficielthailand.com/wp-content/uploads/2020/07/CHANEL-04_0598-scaled.jpg"
                    alt="chBage">
            </div>
            <div class="show_img swiper-slide">
                <img src="https://www.chanel.com/images/q_auto,f_auto,fl_lossy,dpr_auto/w_856/FSH-1646820456372-moblrd02.png"
                    alt="jennie_img3">  
            </div>
            <div class="show_img swiper-slide">
                <img src="https://lofficielthailand.com/wp-content/uploads/2020/07/CHANEL-04_0621-scaled.jpg"
                    alt="latest_pro2">
            </div>
            <div class="show_img swiper-slide">
                <img src="https://lofficielthailand.com/wp-content/uploads/2020/07/CHANEL-04_0544-scaled.jpg"
                    alt="jennie_img2">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

   <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

   <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        });
    </script>

</body>
</html>