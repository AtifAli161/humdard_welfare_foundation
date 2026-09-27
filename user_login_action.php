<?php 

session_start();
require_once 'db.inc.php';

if(isset($_POST['loginBtn']))
{
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `tbl_user` WHERE `user_email`='$email'";

    $run = mysqli_query($con,$sql);

    if(mysqli_num_rows($run) > 0)
    {
        $user_data = mysqli_fetch_assoc($run);
        // print_r ($user_data['password']);
        // exit;
        
        if($user_data['password'] == $password)
        {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['user_email'] = $user_data['user_email'];
            $_SESSION['user_role'] = $user_data['user_role'];
            header('location:user_dashboard.php');
        }
        else
        {
            $_SESSION['login_error'] = "<b>Warning!</b> Invalid Password";
            header('location:login.php');
        }

    }
    else
    {
        $_SESSION['login_error'] = "<b>Warning!</b> Email is not registered";
        header('location:login.php');
    }
}

if(isset($_POST['recoverBtn']))
{
    $email    = $_POST['email'];
    $quiz_id  = $_POST['quiz_id'];
    $answer   = $_POST['answer'];

    $sql = "SELECT * FROM `tbl_user` WHERE `user_email`='$email' AND `quiz_id`='$quiz_id' AND `answer`='$answer'";

    $run = mysqli_query($con,$sql);

    if(mysqli_num_rows($run) > 0)
    {
        $user_recover_data = mysqli_fetch_assoc($run);
        $_SESSION['recover_success'] = "<b>Warning!</b> Set Your New Password Here";
        header('location:reset_password.php?user_id='.$user_recover_data['user_id'].'');
    }
    else
    {
        $_SESSION['recover_error'] = "<b>Warning!</b> Account not found";
        header('location:forgot_password.php');
    }
}

if(isset($_POST['resetBtn']))
{
    $user_id    = $_POST['user_id'];
    $newpassword    = $_POST['newpassword'];
    $cpassword    = $_POST['cpassword'];

    if($newpassword == $cpassword)
    {
        $sql = "UPDATE `tbl_user` SET password='$newpassword' WHERE `user_id`='$user_id'";

        $run = mysqli_query($con,$sql);

        if($run)
        {
            $_SESSION['login_success'] = "<b>Warning!</b> Your Password Has Been Changed Successfully! Login Now";
            header('location:login.php');
        }
        else
        {
            $_SESSION['reset_error'] = "<b>Warning!</b> Password Couldn't Reset! Try Again";
            header('location:reset_password.php?user_id='.$user_recover_data['user_id'].'');
        }
    }
    else
    {
        $_SESSION['reset_error'] = "<b>Warning!</b> Both Password Must Be Same";
        header('location:reset_password.php?user_id='.$user_recover_data['user_id'].'');
    }
}
?>