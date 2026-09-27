<?php 
session_start(); 
require_once 'db.inc.php';

$get_quiz = "SELECT * FROM tbl_quiz WHERE quiz_status = 'Enable'";
$quiz_result = mysqli_query($con,$get_quiz);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register Form</title>
    <link rel="stylesheet" href="user_assets/css/registration.css">
</head>
<style>
    body{
            background-image:url('user_assets/img/create1.jpg');
            background-size:cover;
            background-attachment: fixed;
        }
    .alert
    {
        position:relative;
        top:22px;
        left: 50%;
        transform:translateX(-50%);
        background-color: red;
        padding:20px;
        width:46%;
        border-radius:6px;
        color:#fff;

    }
    .btnBack
    {
        text-decoration:none;
    }
    .btnBack:hover
    {
        text-decoration:none;
    }
</style>
<body>
    
    <?php if(isset($_SESSION['reg_error'])){ ?>
        <div class="alert">
            <?php echo $_SESSION['reg_error']; unset($_SESSION['reg_error']); ?>
        </div>
    <?php } ?>
    <form class="signup-form" action="register_action.php" method="post" style="background:rgba(0,0,0,.6) !important;">

        <!-- form header -->
        <div class="form-header">
            <h1 style="color:white;">Create Account</h1>
        </div>

        <!-- form body -->
        <div class="form-body">

            <!-- Firstname and Lastname -->
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="firstname" class="label-title">First name *</label>
                    <input type="text" name="Fname" id="firstname" class="form-input" placeholder="enter your first name"
                        required="required" />
                </div>
                <div class="form-group right">
                    <label for="lastname" class="label-title">Last name</label>
                    <input type="text" name="lname" id="lastname" class="form-input" placeholder="enter your last name" />
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="label-title">Email*</label>
                <input type="email" name="email" id="email" class="form-input" placeholder="enter your email" required="required">
            </div>

            <!-- Passwrod and confirm password -->
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="password" class="label-title">Password *</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="enter your password"
                        required="required">
                </div>
                <div class="form-group right">
                    <label for="confirm-password" class="label-title">Confirm Password *</label>
                    <input type="password" name="cpassword" class="form-input" id="confirm-password"
                        placeholder="enter your password again" required="required">
                </div>
            </div>

            <!--Address-->

            
            <!--Contact-->
            <div class="form-group right">
                <label for="confirm-password" class="label-title">CNIC Number *</label>
                <input type="number" name="cnic" class="form-input" id="cnic" placeholder="Enter your CNIC Number"
                required="required">
            </div>
            <div class="form-group right">
                <label for="confirm-password" class="label-title">Contact Number *</label>
                <input type="number" name="Cnumber" class="form-input" id="Cnumber" placeholder="Enter your Number"
                required="required">
            </div>
            <div class="form-group right">
                <label for="quiz_id" class="label-title">Security Quiz *</label>
                <select name="quiz_id" id="quiz_id" class="form-input">
                    <option value="" style="color:#fff !important;">--SELECT QUIZ--</option>
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
                <input type="text" name="answer" class="form-input" id="answer" placeholder="Enter your Number"
                required="required">
            </div>
            
            <div class="form-group right">
                <label for="confirm-password" class="label-title">Address *</label>
                <textarea name="address" class="form-input" placeholder="Enter your Address"
                    required="required"></textarea>
            </div>
            <div class="form-group right">
                <label for="" class="label-title">Register as Volunteer</label><br>
                <label for="user_role" class="label-title">
                <input type="checkbox" id="user_role" name="user_role" value="volunteer">
                Volunteer
                </label>
                
            </div>

        </div>

        <!-- form-footer -->
        <div class="form-footer">
            <span>* required</span>
            <a href="login.php" class="btn btnBack">Back To Login</a>
            <a href="index.php" class="btn btnBack">Back To Home</a>
            <button type="submit" name="registerBtn" class="btn">Create</button>
        </div>

    </form>

    <!-- Script for range input label -->
    <script>
        var rangeLabel = document.getElementById("range-label");
        var experience = document.getElementById("experience");

        function change() {
            rangeLabel.innerText = experience.value + "K";
        }
    </script>

</body>

</html>