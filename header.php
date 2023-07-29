<?php
    require_once("database.php");
?>

<link rel="stylesheet" href="css/style.css">
<header class="header">
    <a href="home.php" id="logo">CHANEL</a>

    <nav class="navbar">
        <ul>
            <li> <a href="home.php">Home</a> </li>
            <li> <a href="about.php">About</a> </li>
            <li> <a href="shop.php">Shop</a> </li>
            <li> <a href="contact.php">Contact</a> </li>
            <li> <a href="order.php">Orders</a> </li>
        </ul>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fa-solid fa-bars"> </div>
        <a href="search.php" class="fa-solid fa-magnifying-glass"></a>
        <?php 
            if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['userName'])){
                echo '<i class="fa-solid fa-user" id="userAcc"></i>';
            }else {
                echo '<a href="register.php" class="fa-solid fa-user"></a>';   
            }
        ?>

        <?php
            global $user_Id, $result;
            if(isset($_SESSION['user_Id'])){
                $user_Id = $_SESSION['user_Id'];
                $counter = db()->query("SELECT * FROM cart WHERE user_id = $user_Id");
                
                if(mysqli_num_rows($counter) >0){
                    $result = mysqli_num_rows($counter);
                }else {
                    $result = 0;
                }
                
            }else {
                $result = 0;
            }
        ?>

        <a href="shoppingCart.php" id="cart"> <i class="fa-solid fa-cart-shopping"></i> (<span id="cartValue"><?php echo $result?></span>)</a>
    </div>
    
    <div class="show_userAcc"> 
        <p>username : <span id="userName"> <?php echo $_SESSION['userName'] ?></span> </p>
        <p class="email">email : <span id="email"> <?php echo $_SESSION['email'] ?></span> </p>
        <div class="logout_btn">
            <a href="signOut.php">Sign Out</a>
        </div>
        <div class="showLogRe">
            new <a href="signOut.php">sign out</a> | <a href="register.php">register</a>
        </div>
    </div>
</header>

<!-- JS File Link -->
<script src="js/script.js"></script>