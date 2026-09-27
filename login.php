<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title> Login Form</title>
    <link rel="stylesheet" href="bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_assets/css/login.css">
    <style>
        body{
            background-image:url('user_assets/img/login.png');
            background-size:cover;
        }
        .alert-box{
        width:350px;
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        margin-bottom: 20px;
        top:25px;
    }
    </style>
</head>

<body>
    <div class="alert-box">
        <?php 
        if(isset($_SESSION['login_error'])){ 
            $error = $_SESSION['login_error'];

            unset($_SESSION['login_error']);
            
        ?>

            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>


        <?php } ?>
        
    </div>
    <form action="user_login_action.php" method="POST" style="padding:10px 20px; margin-top:20px;background:rgba(0,0,0,.6) !important;">
    <?php 
        if(isset($_SESSION['login_success'])){ 
            $success = $_SESSION['login_success'];

            unset($_SESSION['login_success']);
            
        ?>

            <div class="alert alert-success mb-5" role="alert">
                <?= $success; ?>
            </div>


        <?php }else{ ?>
            <h3 style="color:white;">Login Form</h3>
        <?php } ?>
        <img src="user_assets/img/user.png">
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="email" name="email" type="text" placeholder="Email" autocomplete="off" required>
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" name="password" type="password" placeholder="Password" required>
        </div>
        <button type="submit" name="loginBtn" class="btn"> Login</button>
        <a href="forgot_password.php" style="display:inline-block;font-family:sans-serif;color:white;margin-top:30px;">Forgot Password?</a><br>
        <a href="register.php" style="display:inline-block;font-family:sans-serif;color:white;margin-top:30px;">Don't have an account?</a><br>
        <a href="index.php" style="display:inline-block;font-family:sans-serif;color:white;margin-top:30px;">Back To Home</a>
    </form>




            

</body>

</html>