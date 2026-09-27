<?php 

session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

if(isset($_POST['add_donation_btn']))
{
    $user_id = $_SESSION['user_id'];
    $category_id = $_POST['category_id'];
    $donation_on = get_date();
    $donation_qty = $_POST['donation_qty'];
    $donation_des = $_POST['donation_des'];

    $sql = '';
    $sql_donate = '';
    $run = '';
    

    // update donation quantity if donation already exist

    // if(is_donation_title_exist($con,trim($donation_des)))
    // {
    //     $donation_qty_exist = get_donation_qty_by_title($con,trim($donation_des));

    //     $donation_qty_exist = $donation_qty_exist + $donation_qty;

    //     $exist_donation_qty = "UPDATE `tbl_donation` SET `donation_qty`='$donation_qty_exist' WHERE `donation_des`='$donation_des'";
    //     mysqli_query($con,$exist_donation_qty);

        
    //     if($category_id == 1)
    //     {
    //         mysqli_query($con,"UPDATE `tbl_furniture` SET `qty`='$donation_qty_exist' WHERE `description`='$donation_des'");
    //     }
    //     else if($category_id == 2)
    //     {
    //         mysqli_query($con,"UPDATE `tbl_book` SET `book_qty`='$donation_qty_exist' WHERE `book_desc`='$donation_des'");
    //     }
    //     else if($category_id == 3)
    //     {
    //         mysqli_query($con,"UPDATE `tbl_clothes` SET `clothes_qty`='$donation_qty_exist' WHERE `clothes_desc`='$donation_des'");
    //     }

    //     $run = true;
        
    // }
    // else
    // {

        if($category_id == 1)
        {
            $sql = "INSERT INTO `tbl_furniture`(`user_id`, `description`, `category_id`, `qty`, `status`) VALUES ('$user_id','$donation_des','$category_id','$donation_qty','Enable')";
        }
        else if($category_id == 2)
        {
            $sql = "INSERT INTO `tbl_book`(`user_id`, `book_desc`,`category_id`, `book_qty`, `book_status`) VALUES ('$user_id','$donation_des','$category_id','$donation_qty','Enable')";
        }
        else if($category_id == 3)
        {
            $sql = "INSERT INTO `tbl_clothes`(`user_id`, `category_id`, `clothes_qty`, `clothes_desc`, `clothes_status`) VALUES ('$user_id','$category_id','$donation_qty','$donation_des','Enable')";
        }
        
        
        $sql_donate = "INSERT INTO `tbl_donation`(`donation_by`, `category_id`, `donation_on`, `donation_qty`, `donation_des`,`donation_status`) VALUES ('$user_id','$category_id','$donation_on','$donation_qty','$donation_des','Pending')";
        
        $run = mysqli_query($con,$sql);
        $run = mysqli_query($con,$sql_donate);
    // }
    


    if($run)
    {
        $_SESSION['donate_success'] = "<b>Alert!</b> Your donation is submitted successfully";
        header('location:manage_donation.php');
    }
    else
    {
        $_SESSION['donate_error'] = "<b>Error!</b>  Your donation does not submitted. Try latter";
        header('location:manage_donation.php');
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $donation_id = $_GET['donation_id'];

    $sql = "delete from `tbl_donation` where `donation_id`='$donation_id'";
    $run = mysqli_query($con,$sql);


if($run)
    {
        $_SESSION['donate_success'] = "<b>Alert!</b>  <b class='text-capitalize'>Donation</b> Deleted successfully";
        header('location:manage_donation.php');
    }
    else
    {
        $_SESSION['donate_error'] = "<b>Error!</b>  <b class='text-capitalize'>Donation</b> does not Deleted";
        header('location:manage_donation.php');
    }
}



if(isset($_POST['btn_update_donation']))
{
    $donation_id = $_POST['hidden_donation_id'];
    $category_id = $_POST['category_id'];
    $donation_qty = $_POST['donation_qty'];
    $donation_des = $_POST['donation_des'];

    $sql = "UPDATE `tbl_donation` SET `category_id`='$category_id',`donation_qty`='$donation_qty',`donation_des`='$donation_des' WHERE `donation_id`='$donation_id'";
    $run = mysqli_query($con,$sql);
    
    if($run)
    {
        $_SESSION['donate_success'] = "<b>Alert!</b>  <b class='text-capitalize'>Donation Record</b> UPDATED successfully";
        header('location:manage_donation.php');
    }
    else
    {
        $_SESSION['donate_error'] = "<b>Error!</b>  <b class='text-capitalize'>Donation Record</b> does not UPDATED";
        header('location:manage_donation.php');
    }
}
?>