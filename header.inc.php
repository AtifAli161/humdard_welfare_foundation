<?php 

session_start();
require_once 'db.inc.php';
require_once 'user_functions.inc.php';

$get_categories = get_categories($con);
// $category_list = mysqli_fetch_array($get_categories);

$search_categories = search_categories($con);
?>



<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamdard welfare Foundation</title>

    <link rel="stylesheet" href="user_assets/css/bootstrap.css">
    <link rel="stylesheet" href="user_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="user_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="user_assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="user_assets/style.css">
    <!-- <link rel="stylesheet" href="team/css.css"> -->
    <link rel="stylesheet" href="user_assets/responsive.css">
    <link rel="stylesheet" href="user_assets/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="user_assets/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="user_assets/assets/css/style.css">


    


    <style>
        *{
            transition:all .3s linear;
            scroll-behavior:smooth;
        }
        .search-box {
            margin-left: 20px;
            margin-top: 10px;
        }

        .search-box .search-input,
        .search-by-cat {
            /* background-color: transparent !important; */
            border: 1px solid white;
            outline: none;
            border-radius: 6px;
        }

        .search-by-cat {
            padding:5px;
        }

        .item {
            background-color: #17bebb;
            text-align: center;
            border-radius: 6px;
            padding: 20px 40px;
            color: white;
        }
        /* #about{
            background-image: url('user_assets/img/about.jpg');
            background-size:cover;
        } */
        .right-img
        {
            width:550px;
            height:350px;
            margin-top:30px;
            box-shadow:1px 2px 6px #333;
        }
        .menu{
            background-color: rgba(0,0,0,.2);
            /* vertical-align:middle; */
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow:1px 2px 6px #333;
        }
        .navbar-nav
        {
            display: flex;
            align-items:center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header class="header">

            <section class="header-bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="menu">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.php">HOME</a></li>
                                    <li class=""><a href="user_dashboard.php">DASHBOARD</a></li>
                                    <li><a href="about.php#about">ABOUT US</a></li>
                                    <!-- <li><a href="blog.html">BLOG</a></li> -->
                                    <li><a href="login.php">LOGIN</a></li>
                                    <li><a href="register.php">REGISTER</a></li>
                                    <?php if(isset($_SESSION['user_id'])){ ?>
                                    <li><a href="" id="logoutBtn">LOGOUT</a></li>
                                    <?php } ?>
                                    <li >
                                        <form action="search.php" method="POST" >
                                            <div class="search-box">
                                                <i class="uil uil-search"></i>
                                                <input type="text" name="search_item" class="search-input"
                                                    placeholder="Search here...">
                                                <select name="category_id" class="search-by-cat">
                                                    <option value="0">Choose Category</option>
                                                    <?php if(mysqli_num_rows($search_categories) > 0){ 
                                                    foreach($search_categories as $list){
                                                        ?>

                                                    <option value="<?= $list['category_id'] ?>">
                                                        <?= $list['category_title'] ?>
                                                    </option>

                                                    <?php } } ?>
                                                </select>
                                                <input type="submit" name="search_btn" value="Search"
                                                    class="btn btn-primary btn-lg">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php if(isset($_SESSION['user_id'])){ ?>
                        <p style="margin-left:0;background:red;"><h2 style="background:rgba(0,0,0,.4);" class="text-light text-capitalize p-1"> <?= $_SESSION['user_name']; ?></h2></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row" style="color: white;margin-left: 61%; font-size: 27px;">
                    <?php 
                if(isset($_SESSION['search-error'])){
                    ?>
                        <span class="text-light bg-danger" style="font-size:18px; position:absolute;top: 68px;"><?= $_SESSION['search-error'] ;?></span>
                    <?php
                }
                 unset($_SESSION['search-error']);
                    
                      
                
                     ?>
                </div>
            </section>


        </header>

        <!-- <div class="home-slider owl-carousel js-fullheight">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                        <div class="col-md-12 ftco-animate">
                            <div class="text w-100 text-center">
                                <h2>CHARITY SEES THE NEED NOT THE CAUES</h2>
                                <h1 class="mb-3">DONATE NOW</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="slider-item js-fullheight" style="background-image:url(img/6.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                        <div class="col-md-12 ftco-animate">
                            <div class="text w-100 text-center">
                                <h2>NO ON HAS EVER BECOME POOR BY GIVING</h2>
                                <h1 class="mb-3">DONATE NOW</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight" style="background-image:url(img/7.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                        <div class="col-md-12 ftco-animate">
                            <div class="text w-100 text-center">
                                <h2>WE RISE BY LIFTING OTHERS</h2>
                                <h1 class="mb-3">DONATE NOW</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <script src="user_assets/js/jquery.min.js"></script>
        <script src="user_assets/js/popper.js"></script>
        <script src="user_assets/js/bootstrap.min.js"></script>
        <script src="user_assets/js/owl.carousel.min.js"></script>
        <script src="user_assets/js/main.js"></script>