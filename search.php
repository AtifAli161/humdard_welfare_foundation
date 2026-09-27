<?php 

session_start();
require_once 'db.inc.php';

if(isset($_POST['search_btn']))
{
    $category_id    = $_POST['category_id'];
    $search_item = $_POST['search_item'];

    // if($category_id == 1)
    // {
    //     $sql = "SELECT * FROM `tbl_medicine` WHERE `medicine_name`='$search_item' WHERE status='Enable'";
    // }
    // else if($category_id == 2)
    // {
    //     $sql = "SELECT * FROM `tbl_book` WHERE `book_title`='$search_item' WHERE book_status='Enable'";
    // }
    // else if($category_id == 3)
    // {
    //     $sql = "SELECT * FROM `tbl_clothes` WHERE `clothes_type`='$search_item' WHERE clothes_status='Enable'";
    // }

     $sql = "SELECT * FROM `tbl_donation` WHERE `category_id`='$category_id' AND `donation_des`='$search_item' AND donation_status='Accepted' LIMIT 4";

    $run = mysqli_query($con,$sql);
        // echo "<pre>";
        // print_r($run);
        // exit;
    if(mysqli_num_rows($run) > 0)
    {
        $_SESSION['search-success'] = "found";
        $data = array();

         foreach($run as $list)
         {
            $data[] = $list;
         }

        $_SESSION['search-item'] = $data;
        header('location:index.php?#search');

    }
    else
    {
        $_SESSION['search-error'] = "<b>Warning!</b> Item not found";
        header('location:index.php');
    }
}




?>