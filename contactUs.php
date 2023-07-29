<?php
    require_once("database.php");
    global $message, $user_Id, $email, $name, $number;

    if(isset($_SESSION['user_Id'])){
        $user_Id = $_SESSION['user_Id'];
    }

    if (isset($_POST['sendMessage_btn'])) {
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['message'];
    }

    $selected_name = db()->query("SELECT first_name, last_name FROM users WHERE email = '$email'");
    if($row = mysqli_fetch_array($selected_name)){
        $name = $row['last_name'] . ' ' . $row['first_name'];
    }

    $result = db()->query("SELECT * FROM saysomething WHERE user_id = $user_Id AND message != '$message'");    
    $num_row = mysqli_num_rows($result);
    if($num_row >=0){
        $insertMess = db()->query("INSERT INTO saysomething(user_id, name, email, number, message) VALUES('$user_Id', '$name', '$email', '$number', '$message')");     
    }
?>

<div class="contact1" id="contact1">
    <h2>Contact Us</h2>
    <div class="contact_us">
        <img src="https://i.pinimg.com/236x/34/25/b7/3425b7d218020c21122b2bb743874f4f.jpg" alt="contact_img">
        <form action="" method="post">
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <input type="number" id="number" name="number" placeholder="Enter your number" required>
            <textarea name="message" id="message" cols="34" rows="2" placeholder="Enter your message" required></textarea>
            <button type="submit" id="btn" class="btn" name="sendMessage_btn">Send Message</button>
        </form>
    </div>

</div>