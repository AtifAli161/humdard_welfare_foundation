<?php 
session_start();
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}


$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'volunteer'){ ?>
  <title>Volunteer Dashboard</title>
  <?php } ?>
  <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'user'){ ?>
  <title>User Dashboard</title>
  <?php } ?>
  <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

  <style>
    *{
      transition:all .3s linear;
    }
    #sidebar{
      background: linear-gradient(45deg,rgb(170, 218, 215),lightblue);
    }
  </style>
</head>
<body>
  <div class="container-scroller">

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <!-- <a class="navbar-brand brand-logo" href="index.html">
            <img src="assets/images/userLogo.jpg" width="200" height="200" alt="logo"/></a> -->

            <a class="navbar-brand brand-logo" href="user_dashboard.php">
              <span class="text-warning text-capitalize"><?php if(isset($_SESSION['user_role'])){ echo $_SESSION['user_role']; }?></span> 
              <span class="text-primary">Dashboard</span>
            </a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item dropdown me-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <!-- <img src="assets/images/faces/a22.jpg" alt="profile"/> -->
              <span class="nav-profile-name text-capitalize"> <?= $_SESSION['user_name']; ?> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="change_password.php">
                <i class="mdi mdi-settings text-primary"></i>
                Change Password
              </a>
              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas"  id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage_donation.php">
              <i class="mdi mdi-table-edit"></i>
              <span class="menu-title">Manage Donation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my_donation.php">
              <i class="mdi mdi-book-plus"></i>
              <span class="menu-title">My Donation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="seeker_request.php">
              <i class="mdi mdi-book-plus"></i>
              <span class="menu-title">My Request</span>
            </a>
          </li>

          <!-- delivered donation button -->
          <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'user'){ ?>
            <!-- Reciever button -->
            <!-- <li class="nav-item">
            <a class="nav-link" href="donation_reciever.php">
              <i class="mdi mdi-book-plus"></i>
              <span class="menu-title">Recievers</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="delivered_donations.php">
              <i class="mdi mdi-book-plus"></i>
              <span class="menu-title">Delivered Donations</span>
            </a>
          </li> -->
          <?php } ?>
          <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'volunteer'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="my_tasks.php">
              <i class="mdi mdi-assistant"></i>
              <span class="menu-title">My Tasks <!--<span class="badge bg-danger badge-pill"><?= count_tasks($con,$user_id); ?></span>--> </span>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>

      <div class="main-panel">
        <div class="content-wrapper">