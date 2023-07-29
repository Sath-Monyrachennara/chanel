<?php
    require_once('database.php');
    $errorEmail = false;

    if (isset($_POST['register_btn'])) {
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $passwords = $_POST['passwords'];
        $userType = $_POST['userType'];
    }

    if(!empty($email) && !empty($firstName) && !empty($lastName) && !empty($passwords) && !empty($userType)) {          
        // Check email is valid or invalid email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); 
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            alert("Your email is invalid email.");
            $errorEmail = true;
        }else{
            $errorEmail = false;
        }  

        $cemail = db()->query("SELECT * FROM users WHERE email = '$email'");
        $num_row = mysqli_num_rows($cemail);
        if($num_row > 0){
            echo 'Your email is not allivable.';
        }else {
            if($errorEmail == false){
                $id = db()->query("SELECT id FROM users ");
                $user_Id = mysqli_num_rows($id) + 1;
                $insertInfo = db()->query("INSERT INTO users(user_id, email, first_name, last_name, passwords, user_type) VALUES('$user_Id', '$email', '$firstName', '$lastName', '$passwords', '$userType')");
            }
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
    <title>register</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="registerAcc">
        <h1>ACCOUNT</h1>
        <div class="account">
            <div class="account_header">
                <a href="signIn.php">SIGN IN</a>
                <a href="register.php" id="register">REGISTER</a>
            </div>

            <div class="register">
                <div class="heading head1">
                    <p>Create an account and benefit from a more personal shopping experience, and quicker online checkout.</p>
                    <p>All fields are mandatory.</p>
                </div>

                <form action="" class="form" method="post">
                    <input type="email" required placeholder="Email" id="email" name="email">
                    <input type="text" required placeholder="First name" id="firstName" name="firstName">
                    <input type="text" required placeholder="Last name" id="lastName" name="lastName">
                    <input type="password" required placeholder="Password" id="password" name="passwords">
                    <select name="userType" id="userType" required>
                        <option value="" disabled selected>User Type</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                    <button type="submit" id="register_btn" name="register_btn">Register Now</button>
                    <small>already have an account? <a href="signIn.php">Sign In</a> </small>
                </form>

            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>