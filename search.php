<?php
    session_start();
    require_once("database.php");
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>  
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font awesome file link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="search">
        <div class="search_som">
            <input type="text" placeholder="search products..." id="search_value">
            <button type="submit" id="search_btn" name="search_btn">Search</button>
        </div>

        <div class="show_search">
            <p id="para">search something!</p>
        </div>

    </div>

    <?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>     

    <script type="text/javascript">
        $(document).ready(function() {
            var input;
            $("#search_value").keyup(function() {
                input = $(this).val();
              //  alert(input);
            });

            $("#search_btn").on('click', function(e){
                e.preventDefault();
                if(input != "") {
                    $.ajax({
                        url:"liveSearch.php",
                        method:"post",
                        data:{input:input},
                        success:function(data){
                            $(".show_search").html(data);
                            $(".show_search").css("display", "block");
                            $(".show_search #para").css("display", "none");
                        }
                    });
                }
            });
            
        });
    </script>
</body>
</html>

<?php
}else {
    header("Location: signIn.php");
}
?>