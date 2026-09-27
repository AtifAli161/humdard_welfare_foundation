<?php 
session_start(); 
require_once 'db.inc.php';

$get_quiz = "SELECT * FROM tbl_quiz WHERE quiz_status = 'Enable'";
$quiz_result = mysqli_query($con,$get_quiz);


?>

<!DOCTYPE html>
<html>

<head>
    <title> Forgot Password</title>
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
        if(isset($_SESSION['recover_error'])){ 
            $error = $_SESSION['recover_error'];

            unset($_SESSION['recover_error']);
            
        ?>

            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>


        <?php } ?>
    </div>
    <form action="user_login_action.php" method="POST" style="padding:10px 20px; margin-top:20px;background:rgba(0,0,0,.6) !important;">
    <h3 style="color:white;">Forgot Password</h3>
        <img src="user_assets/img/user.png">
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="email" name="email" type="text" placeholder="Email" autocomplete="off" required>
        </div>
        <div class="form-group right">
                <label for="quiz_id" class="label-title">Security Quiz *</label>
                <select name="quiz_id" id="quiz_id" class="input-field">
                    <option value="">--SELECT QUIZ--</option>
                    <?php 
                    if(mysqli_num_rows($quiz_result) > 0){
                        foreach($quiz_result as $list){
                    ?>
                    <option value="<?= $list['quiz_id'] ?>"><?= $list['quiz_title'] ?></option>

                    <?php } } ?>
                </select>
            </div>
            <div class="form-group right">
                <label for="answer" class="label-title">Answer *</label>
                <input type="text" name="answer" class="input-field" id="answer" placeholder="Enter your Number"
                required="required">
            </div>
        
        <button type="submit" name="recoverBtn" class="btn mt-3">Recover</button>

        <a href="login.php" style="display:inline-block;font-family:sans-serif;color:white;margin-top:30px;">Already have an account?</a>
        
    </form>




            

</body>

</html>