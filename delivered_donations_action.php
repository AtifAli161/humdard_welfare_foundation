<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

$success = '';
$error = '';

if(isset($_GET['type']) && $_GET['type'] == "status")
{
    $request_id = $_GET['request_id'];
    $action     = $_GET['action'];

    $sql = "UPDATE `tbl_request` SET `delivery_status`='$action' WHERE `request_id`='$request_id'";

    mysqli_query($con,$sql);
    header('location:delivered_donations.php');
}





if(isset($_POST['action']) && $_POST['action'] == "send_message")
{
    $comment_by = $_SESSION['user_id'];
    $request_id = $_POST['request_id'];
    $subject    = $_POST['subject'];
    $message    = $_POST['message'];
    $comment_on = get_date();
    
    $sql = "INSERT INTO `tbl_comment`(`comment_by`, `request_id`, `subject`, `message`, `comment_on`) VALUES ('$comment_by','$request_id','$subject','$message','$comment_on')";

    $run = mysqli_query($con,$sql);

    if($run)
    {
        $success = '<div class="alert alert-success"> <b>Alert!</b> Message Send Successfully!</div>';
    }
    else
    {
        $error = '<div class="alert alert-danger"> <b>Error!</b> Message Sending Failed!</div>';
    }

    $data = array(
        'success' => $success,
        'error'   => $error
    );

    echo json_encode($data);
}

?>