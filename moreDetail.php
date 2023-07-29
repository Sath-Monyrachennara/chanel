<?php
  session_start();
  require_once("database.php");
  
  $id = $_GET['id'];
  $selectData = db()->query("SELECT * FROM product WHERE id = $id");
  if($row = mysqli_fetch_array($selectData)) {
    $id = $row['id'];
    $name = $row['pro_name'];
    $color = $row['color'];
    $price = $row['pro_price'];
    $dimensions = $row['dimensions'];
    $image = $row['proDetail_img'];  
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Detail</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <div class="moreDetail">
        <div class="swiper mySwiper productImg">
            <div class="swiper-wrapper proImg">
              <?php
                  $totalFile = glob("productImages/$image/". "*");
                  foreach ($totalFile as $totalFiles)
                {
                  echo '
                  <div class="swiper-slide imgs">
                    <img src="'.$totalFiles.'" alt="Image">
                  </div>
                  ';
                }
                mysqli_close(db());
              ?>
              </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="proDetail">
          <h2 id="proName"> <?php echo $name ?> </h2>
          <p id="proColor"> <?php echo $color ?> </p>
          <p id="price">$ <?php echo $price ?> </p>
          <p id="proSize"> <span>Dimensions</span> <?php echo $dimensions ?> in ( <u>cm</u> ) </p>
          <button type="submit" id=<?php echo $id ?> class="add_cart">Add To Cart</button>
        </div>

  </div>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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
  
  <!-- JS File Link -->
  <script src="js/script.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      var counter = 0;

      $(".add_cart").on("click", function(){
          var id = this.id;
          var quantity = 1;
          counter = counter + 1;

          $.ajax({
            url:'shoppingCart.php',
            method:'post',
            data:{id:id, quantity:quantity},
            success:function(){
              var totalCount;
              var count = $(".header .icons #cart span").text();
              if(count != counter){
                totalCount = parseInt(count) + 1;
              }else {
                totalCount = counter;
              }

              $(".header .icons #cart span").html(totalCount);
              alert("Product added!");
            }
          }); 
      });
    });
  </script>
  
  <?php include 'footer.php'; ?>
</body>
</html>