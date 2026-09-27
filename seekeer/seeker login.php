<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title> Login Form</title>
    <link rel="stylesheet" href="bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../user_assets/css/login.css">
</head>
<style>
    .alert-box{
        width:350px;
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        margin-bottom: 20px;
        top:25px;
    }
</style>
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
    <form action="seeker login_action.php" method="POST" style="margin-top:20px;">
        <img src="../user_assets/img/user.png">
        <h1 style="color:white;display:inline-block;font-family:sans-serif;"> Seeker Login </h1>
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="email" name="email" type="text" placeholder="Email">
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" name="password" type="password" placeholder="Password">
        </div>
        <button type="submit" name="loginBtn" class="btn"> Login</button>
        <a href="register.php" style="display:inline-block;font-family:sans-serif;color:white;margin-top:30px;">Don't have an account?</a>
    </form>




            

</body>

</html>