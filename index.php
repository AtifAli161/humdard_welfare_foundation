<?php 

require_once 'header.inc.php'; 
$user_id = '';

if(isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'];
}

if(isset($_SESSION['req_success']))
{
    unset($_SESSION['req_success']);
    ?>

    <script>
        alert("Your Request Has Been Sent To Admin Wait For Their Response");
    </script>


    <?php
}

if(isset($_SESSION['req_error']))
{
    unset($_SESSION['req_error']);
    ?>

    <script>
        alert("Your Request Has Been Not Sent To Admin Try Again");
    </script>


    <?php
}

?>
<?php if(isset($_SESSION['search-item'])){    
?>
<section class="item_area my-5 bg-warning" id="search">
    <h1 style="padding-top: 20px;" class="text-dark">Item Found</h1><hr>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <?php
            $search_items = $_SESSION['search-item'];
                foreach($search_items as $item){    
            ?>
            <div class="col-md-4">
            <div class="card">
                <div class="card-title">
                    <h2 class="card-header text-capitalize">Category : <?= get_category_title($con,$item['category_id']); ?></h2>
                </div>
                <div class="card-body">
                    Item : <?= $item['donation_des'] ?>
                    <br>
                    Quantity : <?= $item['donation_qty']; ?>
                </div>
                <div class="card-footer">
                <a href="request_form.php?action=donation_request&user_id=<?= $user_id; ?>&category_id=<?= $item['category_id']; ?>&donation_id=<?= $item['donation_id']; ?>#contactForm"  class="btn btn-danger form-control">Request</a>
                <!-- <a href="request.php?action=donation_request&user_id=<?= $user_id; ?>&category_id=<?= $item['category_id']; ?>&donation_id=<?= $item['donation_id']; ?>"  class="btn btn-danger form-control deleteDonation">Request</a> -->
                </div>
            </div>
            </div>
            
            <?php } unset($_SESSION['search-item']); ?>

        </div>

        
    </div>
    </div>

    <!--End Items -->
            
</section>
<?php }else{ 
   $_SESSION['search_error'] ="<div class='show_msg'>Item not Found</div>";
    ?>



<!--start Items -->

<section class="item_area">
    <h1 style="padding-top: 20px;"> Top Items</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="user_assets/team/i1.png">
                    </div>
                    <h3 class="title"><?= $get_categories[0]['category_title']; ?></h3>
                    <span class="post"><a href="manage_donation.php">Donate now</a></span>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="user_assets/team/i2.jpg">
                    </div>
                    <h3 class="title"><?= $get_categories[1]['category_title']; ?></h3>
                    <span class="post"><a href="manage_donation.php">Donate now</a></span>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="user_assets/team/i3.jpg">
                    </div>
                    <h3 class="title"><?= $get_categories[2]['category_title']; ?></h3>
                    <span class="post"><a href="manage_donation.php">Donate now</a></span>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!--End Items -->

</section>




<div>
    <div class="clear"></div>
    <section class="volunteer_area">
        <h1 style="padding-top: 20px;"> Top Volunteer</h1>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/image1.jpg">
                        </div>
                        <h3 class="title">Atif Ali Shah</h3>
                        <span class="post">Student</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/image2.jpg">
                        </div>
                        <h3 class="title">M. khan</h3>
                        <span class="post">Employee</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/image3.jpg">
                        </div>
                        <h3 class="title">Awais</h3>
                        <span class="post">Teacher</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets\team\image4442.jpg">
                        </div>
                        <h3 class="title">Arham</h3>
                        <span class="post">Web Designer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fab fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--start Donor -->
    <section class="volunteer_area">
        <h1 style="padding-top: 20px;"> Top Donors</h1>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/d11.jpg">
                        </div>
                        <h3 class="title">Zunair hussain</h3>
                        <span class="post">Entrepreneur</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/d2.jpg">
                        </div>
                        <h3 class="title">Raza Shah</h3>
                        <span class="post">Doctor</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/d3.jpg">
                        </div>
                        <h3 class="title">Hamza ahmad</h3>
                        <span class="post">Freelancer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="user_assets/team/d4.jpg">
                        </div>
                        <h3 class="title">Shariq shah</h3>
                        <span class="post">Developer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fab fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Donor -->

    </section>





    <!-- <section class="letast_news">
        <h2>latest news</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single_news">
                        <img src="user_assets/img/news_images_1.jpg" alt="">
                        <div class="texts">
                            <p class="date"><a href="#">30 OCT, 2021</a></p>
                            <h3>Help other <br> To raise yourself</h3>
                            <h3><a href="#">READ MORE</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single_news">
                        <img src="user_assets/img/news_images_2.jpg" alt="">
                        <div class="texts">
                            <p class="date"><a href="#">10 DEC, 2021</a></p>
                            <h3>Noone has ever become poor <br> By giving</h3>
                            <h3><a href="#">READ MORE</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single_news">
                        <img src="user_assets/img/news_images_3.jpg" alt="">
                        <div class="texts">
                            <p class="date"><a href="#">19 NOV, 2021</a></p>
                            <h3>Charity sees the need <br> Not the cause</h3>
                            <h3><a href="#">READ MORE</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <?php } require_once 'footer.inc.php'; ?>