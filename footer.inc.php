<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="footer-charity-text">
                    <h2>HELP CHARITY</h2>
                    <p>Charity is the act of giving help to those in need of it.It is a humanitarian act.It
                        involves giving money,goods or time and effort to those who need it.HWF is developed to
                        help people's and make their life happy and easy</p>
                    <hr>
                    <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance"
                                aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble"
                                aria-hidden="true"></i></a></p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 col-sm-3">
                        <div class="footer-text two">
                            <h3>USEFUL LINKS</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <!-- <li><a href="blog.html">Blog</a></li> -->
                                <li><a href="login.php">login</a></li>
                                <li><a href="register.php">Registration</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-text one">
                            <h3>CONTACT US</h3>
                            <ul>
                                <li style="color:white;">Our Address : <br> <a href="#"> <i class="material-icons"></i>Sahabzada Town Akora
                                        Khattak</a></li>
                                <li style="color:white;">Email : <a href="#"><i class="material-icons"></i>Atifalikpk2018@gmail.com</a>
                                </li>
                                <li style="color:white;">Contact Us : <a href="#"> <i class="material-icons"></i>+923454094337</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="footer_bottom">
        <p>Copyright @ <?= date('Y'); ?> Hamdard Welfare Founation | All Rights Reserved </p>
    </div>
</footer>
</div>
<script src="user_assets/js/jquery-3.1.1.min.js"></script>
<script src="user_assets/js/animationCounter.js"></script>
<script src="user_assets/js/bootstrap.min.js"></script>
<script src="user_assets/js/owl.carousel.min.js"></script>
<script src="user_assets/js/active.js"></script>

<!--  carousel assets -->
<script src="user_assets/assets/js/jquery.min.js"></script>
<script src="user_assets/assets/js/popper.js"></script>
<script src="user_assets/assets/js/bootstrap.min.js"></script>
<script src="user_assets/assets/js/owl.carousel.min.js"></script>
<script src="user_assets/assets/js/main.js"></script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>



<script>
    $(document).ready(function(){
        $('#logoutBtn').click(function(){
            if(confirm("Are you sure you want to LOGOUT?"))
            {
                window.location.href = "logout.php";
            }
        })
    })
</script>
</body>

</html>