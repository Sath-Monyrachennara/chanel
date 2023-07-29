<?php
    session_start();
    require_once("database.php");

    global $email, $password, $userName;
    if(isset($_POST['signIn_btn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    
    if(!empty($email) && !empty($password)){
        $result = db()->query("SELECT * FROM users WHERE email = '$email' AND passwords = '$password'");
        if(mysqli_num_rows($result) === 1){
            if($row = mysqli_fetch_array($result)){
                $_SESSION['user_Id'] = $row['user_id'];
                $_SESSION['userName'] = $row['last_name']." ".$row['first_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['passwords'];
                $_SESSION['userType'] = $row['user_type'];

                if($_SESSION['userType'] == 'admin'){
                    header('Location: admin_page.php');
                }else {
                    header('Location: home.php');
                }            
            }
        }else {
            header('Location:signIn.php');
            echo '<script> alert("Your email or password is incorrect!"); </script>';
        }    
    }
    mysqli_close(db());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign In</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="signIn_Acc">
        <h1>ACCOUNT</h1>
        <div class="account">
            <div class="account_header">
                <a href="signIn.php" id="signIn">SIGN IN</a>
                <a href="register.php">REGISTER</a>
            </div>

            <div class="signIn">
                <div class="heading">
                    <h3>WELCOME BACK.</h3>
                    <p>Sign in with your email and password.</p>
                </div>

                <form action="" class="form" method="post" autocomplete="off">
                    <input type="email" required placeholder="Email" id="email" name="email">
                    <input type="password" required placeholder="Password" id="passwords" name="password">
                    <button type="submit" id="signIn_btn" name="signIn_btn">Sign In</button>
                    <small>don't have an account? <a href="register.php">register now</a> </small>
                </form>

            </div> 
        </div> 
    </div> 

    <?php include 'footer.php'; ?>

</body>
</html>