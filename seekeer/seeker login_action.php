<?php 

session_start();
require_once '../db.inc.php';

if(isset($_POST['loginBtn']))
{
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `tbl_seekar` WHERE `seekar_email`='$email'";

    $run = mysqli_query($con,$sql);

    if(mysqli_num_rows($run) > 0)
    {
        $seekar_data = mysqli_fetch_assoc($run);
        
        if($seekar_data['password'] == $password)
        {
            $_SESSION['seekar_id'] = $seekar_data['seekar_id'];
            $_SESSION['seekar_name'] = $seekar_data['seekar_name'];
            $_SESSION['seekar_email'] = $seekar_data['seekar_email'];

            header('location:My_requests.php');
        }
        else
        {
            $_SESSION['login_error'] = "<b>Warning!</b> Invalid Password";
            header('location:seekar login.php');
        }

    }
    else
    {
        $_SESSION['login_error'] = "<b>Warning!</b> Email is not registered";
        header('location:seekar login.php');
    }
}




?>