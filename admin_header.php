<?php
    if(isset($_SESSION['userName']) && isset($_SESSION['email'])){
        $userName = $_SESSION['userName'];
        $email = $_SESSION['email'];
    }
?>

<section class="header">
    <nav class="navbar">
        <a href="admin_page.php" id="logo">Admin <span>Panel</span> </a>
        <ul id="menu">
            <li> <a href="admin_page.php">home</a> </li>
            <li> <a href="admin_products.php">products</a> </li>
            <li> <a href="admin_orders.php">orders</a> </li>
            <li> <a href="admin_users.php">users</a> </li>
            <li> <a href="admin_messages.php">messages</a> </li>
        </ul>
        <div class="icons">
            <div id="menu_btn" class="fa-solid fa-bars"> </div>
            <i class="fa-solid fa-user" id="userAcc"></i>
        </div>

    </nav>

    <div class="show_userAcc"> 
        <p>username : <span id="userName"> <?php echo $userName ?></span> </p>
        <p class="email">email : <span id="email"> <?php echo $email?></span> </p>
        <div class="logout_btn">
            <a href="signOut.php">Sign Out</a>
        </div>
        <div class="showLogRe">
            new <a href="signOut.php">sign out</a> | <a href="register.php">register</a>
        </div>
    </div>

</section>