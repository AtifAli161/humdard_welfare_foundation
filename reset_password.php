<?php 
session_start(); 

$user_id = '';

if(isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title> Login Form</title>
    <link rel="stylesheet" href="bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_assets/css/login.css">
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
        if(isset($_SESSION['reset_error'])){ 
            $error = $_SESSION['reset_error'];

            unset($_SESSION['reset_error']);
            
        ?>

            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>


        <?php } ?>
        <?php 
        if(isset($_SESSION['recover_success'])){ 
            $success = $_SESSION['recover_success'];

            unset($_SESSION['recover_success']);
            
        ?>

            <div class="alert alert-success" role="alert">
                <?= $success; ?>
            </div>


        <?php } ?>
    </div>
    <form action="user_login_action.php" method="POST" style="margin-top:20px;">
    <h3 style="color:white;">RESET PASSWORD</h3>
        <img src="user_assets/img/user.png">
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" name="newpassword" type="text" placeholder="New Password" required>
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" name="cpassword" type="text" placeholder="Confirm Password" required>
        </div>
        <button type="submit" name="resetBtn" class="btn">Reset</button>
        <input type="hidden" name="user_id" value="<?= $user_id; ?>">
    </form>




            

</body>

</html>