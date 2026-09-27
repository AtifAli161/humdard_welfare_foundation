<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

if(isset($_POST['requestBtn']))
{
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $donation_id = $_POST['donation_id'];
    $qty = $_POST['qty'];
    $address = $_POST['address'];
    $date = get_date();

    $sql = "INSERT INTO `tbl_request`(`user_id`, `category_id`, `donation_id`, `required_qty`, `delivery_destination`, `request_status`, `request_time`) VALUES ('$user_id','$category_id','$donation_id','$qty','$address','Pending','$date')";

    if(mysqli_query($con,$sql))
    {
        $_SESSION['req_success'] = "success";
        header('location:index.php');
    }
    else
    {
        $_SESSION['req_error'] = "error";
        header('location:index.php');
    }

}

?>