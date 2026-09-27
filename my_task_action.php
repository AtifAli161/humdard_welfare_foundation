<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

if(isset($_POST['add_donation_btn']))
{
    $user_id = $_SESSION['user_id'];
}


if(isset($_GET['type']) && $_GET['type'] == 'status')
{
    $assign_volunteer_id = $_GET['assign_volunteer_id'];
    $action = $_GET['action'];

    $sql = "UPDATE `tbl_assign_volunteer` SET `task_status`='$action' WHERE `assign_volunteer_id`='$assign_volunteer_id'";
    mysqli_query($con,$sql);

    header('location:my_tasks.php');
}


if(isset($_GET['action']) && $_GET['action'] == 'Seen')
{
    $assign_volunteer_id = $_GET['assign_volunteer_id'];
    $action = $_GET['action'];

    $sql = "UPDATE `tbl_assign_volunteer` SET `notify`='$action' WHERE `assign_volunteer_id`='$assign_volunteer_id'";
    mysqli_query($con,$sql);

    header('location:admin/admin_dashboard.php');
}




?>