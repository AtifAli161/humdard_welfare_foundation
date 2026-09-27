<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

if(isset($_POST['registerBtn']))
{
    $Fname = $_POST['Fname'];
    $lname = $_POST['lname'];
    $fullname = $Fname." ".$lname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $cnic = $_POST['cnic'];
    $Cnumber = $_POST['Cnumber'];
    $address = $_POST['address'];
    $user_role = $_POST['user_role'];
    $quiz_id = $_POST['quiz_id'];
    $answer = $_POST['answer'];
    $date = get_date();
    $sql = '';
    if(!is_cnic_exist($con,$cnic))
    {
        if($password == $cpassword)
        {
            if(isset($user_role))
            {
                $sql = "INSERT INTO `tbl_user`(`user_name`, `user_email`, `password`, `user_phone`, `user_cnic`, `user_address`,`user_role`, `quiz_id`, `answer`, `user_status`, `added_on`) VALUES ('$fullname','$email','$password','$Cnumber','$cnic','$address','$user_role','$quiz_id','$answer','Enable','$date')";
            }
            else
            {
                $sql = "INSERT INTO `tbl_user`(`user_name`, `user_email`, `password`, `user_phone`, `user_cnic`, `user_address`, `quiz_id`, `answer`, `user_status`, `added_on`) VALUES ('$fullname','$email','$password','$Cnumber','$cnic','$address','$quiz_id','$answer','Enable','$date')";
            }

        if(mysqli_query($con,$sql))
        {
            $_SESSION['login_success'] = "<b>Alert!</b> Account Created Successfully";
            header('location:login.php');
        }
        else
        {
            $_SESSION['reg_error'] = "<b>Error!</b> Account Does Not Created.";
            header('location:register.php');
        }
        }
        else
        {
            $_SESSION['reg_error'] = "<b>Warning!</b> Both password must be same.";
            header('location:register.php');
        }
    }
    else
    {
        $_SESSION['reg_error'] = '<b>Warning!</b> <b>'.$cnic.'</b> Number already Exist';
        header('location:register.php');
    }
}



?>