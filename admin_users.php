<?php
    session_start();
    require_once('database.php');
    global $user_Id;

    if(isset($_POST['user_Id'])){
        $user_Id = $_POST['user_Id'];
    }
    $deletedUser = db()->query("DELETE FROM `users` WHERE `user_id` = '$user_Id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    
    <div class="userAcc">
        <h1 class="heading">user accounts</h1>
        <div class="show_acc">
            <?php
                $result = db()->query("SELECT * FROM users");
                $num_row = mysqli_num_rows($result);
                echo '<div class="user_acc">';
                for($i=1 ;$i<=$num_row; $i++){
                    if($row = mysqli_fetch_array($result)){
                        $userName = $row['last_name']." ".$row['first_name'];
                        $userId = $row['user_id'];
                        $email = $row['email'];
                        $userType = $row['user_type'];
            ?>
                        <div class="account showResult">
                            <p>User id : <span class="userId"><?php echo $userId ?></span> </p>
                            <p>Username : <span class="userName"><?php echo $userName ?></span> </p>
                            <p>Email : <span class="email"><?php echo $email ?></span> </p>
                            <?php
                                if($userType == 'admin'){
                                    echo '<p>User type : <span class="userType" style="color: #E5AC44">'.$userType.'</span> </p>';
                                }else {
                                    echo '<p>User type : <span class="userType">'.$userType.'</span> </p>';
                                }
                            ?>
                            <div class="button">
                                <button type="submit" class="delete_btn" id="<?php echo $userId ?>">Delete User</button>
                            </div>
                        </div>
            <?php 
                    }
                    if($i%3 == 0){
                        echo '</div>';
                        echo '<div class="user_acc">';
                    }
                }
                echo '</div>';
                mysqli_close(db());
            ?>    
        </div>
    </div>

    <!-- JS File Link -->
    <script src="js/admin_script.js"> </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete_btn").on("click", function(){
                var user_Id = this.id;
                $.ajax({
                    url:'admin_users.php',
                    method:'post',
                    data:{user_Id:user_Id},
                    success:function(){
                        alert("User deleted.");
                    }
                });
            });
        });
    </script>

</body>
</html>