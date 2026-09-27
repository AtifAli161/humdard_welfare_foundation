<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

// if(isset($_GET['type']) && $_GET['type'] == 'status')
// {
//     $request_id = $_GET['request_id'];
//     $action = $_GET['action'];

//     $sql = "UPDATE `tbl_request` SET `request_status`='$action' WHERE `request_id`='$request_id'";

//     if(mysqli_query($con,$sql))
//     {
//         header('location:seeker_request.php');
//     }
// }


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $request_id = $_GET['request_id'];

    $sql = "DELETE FROM `tbl_request` WHERE `request_id`='$request_id'";

    if(mysqli_query($con,$sql))
    {
        $_SESSION['seeker_req_success'] = "<b>Alert!</b> Your donation is <b>DELETED</b> successfully";
        header('location:seeker_request.php');
    }
    else
    {
        $_SESSION['seeker_req_error'] = "<b>Error!</b>  Your donation does not <b>DELETED</b> Try latter";
        header('location:seeker_request.php');
    }
}

?>