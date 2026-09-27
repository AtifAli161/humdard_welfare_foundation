<?php 
session_start();
require_once 'db.inc.php';

if(isset($_POST['change_password_btn']))
{
    $user_id = $_SESSION['user_id'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password != $confirm_password)
    {
        $_SESSION['pass_error'] = "<b>Error!</b>  <b class='text-capitalize'>Both Password</b> must be same";
        header('location:change_password.php');
    }
    else
    {
        $sql = "UPDATE `tbl_user` SET password='$new_password' WHERE `user_id`='$user_id'";
        $run = mysqli_query($con,$sql);
        
        if($run)
        {
            $_SESSION['pass_success'] = "<b>Alert!</b>  <b class='text-capitalize'>Password</b> Changed successfully";
            header('location:change_password.php');
        }
        else
        {
            $_SESSION['pass_error'] = "<b>Error!</b>  <b class='text-capitalize'>Password</b> does not Changed";
            header('location:change_password.php');
        }
    }
}




?>