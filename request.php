<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}



if(isset($_GET['action']) && $_GET['action'] == 'donation_request')
{
    $user_id     = $_GET['user_id'];
    $category_id = $_GET['category_id'];
    $donation_id = $_GET['donation_id'];
    $date = get_date();

    $sql = "INSERT INTO `tbl_request`(`user_id`, `category_id`, `donation_id`, `request_status`, `request_time`) VALUES ('$user_id','$category_id','$donation_id','Pending','$date')";

    if(mysqli_query($con,$sql))
    {
        $_SESSION['req_success'] = "req_send";
        header('location:index.php');
    }
    else
    {
        $_SESSION['req_error'] = "req_error";
        header('location:index.php');
    }

}


?>