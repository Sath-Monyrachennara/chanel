<?php
    session_start();
    require_once("database.php");
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){

    global $message, $user_Id, $name, $email, $number;

    if(isset($_SESSION['user_Id'])){
        $user_Id = $_SESSION['user_Id'];
    }

    if (isset($_POST['btn_message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['message'];
    }

    $result = db()->query("SELECT * FROM `saysomething` WHERE `user_id` = '$user_Id' AND `message` != '$message'");    
    $num_rows = mysqli_num_rows($result);
    if($num_rows >=0){
        $insertMess = db()->query("INSERT INTO `saysomething`(user_id, name, email, number, message) VALUES('$user_Id', '$name', '$email', '$number', '$message')");
    }
    mysqli_close(db());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="contact">
        <div class="contact_img">
            <img src="https://i.pinimg.com/564x/93/3b/5a/933b5a72fe4bc987df883f15781b117c.jpg" alt="image1">
        </div>

        <div class="contact2">
            <h2>SAY SOMETHING!</h2>
            <form action="" method="post">
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <input type="number" id="number" name="number" placeholder="Enter your number" required>
                <textarea name="message" id="message" cols="34" rows="5" placeholder="Enter your message" required></textarea>
                <button type="submit" id="btn_message" class="btn_message" name="btn_message">Send Message</button>
            </form>
        </div>

    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
<?php
}else {
    header("Location: signIn.php");
}
?>