<?php 
 session_start();
 if(!isset($_SESSION['seekar_id']))
{
    header('location:seelar_login.php');
}
  require_once 'seekar_footer.php'; 
    require('../db.inc.php');
    $seekarname=$_SESSION["seekar_name"];
    $query = "SELECT * FROM seekar_requests where Seekar_Name='$seekarname'";
    $result = mysqli_query($con, $query);


 ?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Seekar Dashboard</title>
  <link rel="stylesheet" href="../admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/assets/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="../admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <link rel="shortcut icon" href="../admin/assets/images/favicon.png" />

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../admin/assets/css/normalize.css">
      <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="../admin/assets/css/themify-icons.css">
      <link rel="stylesheet" href="../admin/assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="../admin/assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="../admin/assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


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

            <a class="navbar-brand brand-logo" href="My_Requests.php">
              <span class="text-warning text-uppercase">Seekar</span> 
              <span class="text-primary text-uppercase">Dashboard</span>
            </a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown me-4">
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
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="../admin/assets/images/faces/a22.jpg" alt="profile"/>
              <span class="nav-profile-name"> <?= $_SESSION['seekar_name']; ?> </span>
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
    <div class="container-fluid page-body-wrapper" style="margin-top: -68px;">
      <nav class="sidebar sidebar-offcanvas"  id="sidebar">
        <ul class="nav">
                  <li class="nav-item">
            <a class="nav-link" href="My_Requests.php">
              <i class="mdi mdi-table-edit"></i>
              <span class="menu-title">My Request</span>
            </a>
          </li>
    
          
          <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li> -->
        </ul>

      </nav>
      <!-- partial -->


      <div class="main-panel">

      
      

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <h4 class="box-title" style="margin-left: 10px; margin-top: -30px; color: blue">My Requests </h4> 
                                 <thead>

                                    <tr>
                                       <th>Item Name</th>
                                       <th>Catagory</th>
                                         <th>Donor Name </th>
                                       <th>Category</th>
                                       <th>Date/Time</th>

                                   
                                     
                                       <th> Status </th>   
                                    </tr>
                                 </thead>
                                 <tbody>
                                       <?php 
                                       while($row = mysqli_fetch_assoc($result))
                                       {
                                       ?>
                                    <tr>
                                     
                                       <td><?php echo $row['Item_Name']; ?></td>
                                        <td><?php echo $row['Category']; ?></td>
                                       <td><?php 
                                           echo $row['Doner_Name'];
                                        ?> </td>
                                          <td><?php 
                                           echo $row['Category'];
                                        ?> </td>
                                          <td><?php 
                                           echo $row['Date/Time'];
                                        ?> </td>
                                          <td><?php 
                                           echo $row['Status'];
                                        ?> </td>
                                    
                                  
                                    </tr>
                                   <?php
                                    }
                                   ?> 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </body>
      </html>
    
  