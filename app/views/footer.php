<!-- Benefit -->

<div class="benefit">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>free shipping</h6>
                        <p>Suffered Alteration in Some Form</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>cach on delivery</h6>
                        <p>The Internet Tend To Repeat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>45 days return</h6>
                        <p>Making it Look Like Readable</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>opening all week</h6>
                        <p>8AM - 09PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->
<!-- 
<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                    <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                    <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="<?php echo BASE_URL ?>/public/user/styles/bootstrap4/popper.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/plugins/Magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/plugins/easing/easing.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="<?php echo BASE_URL ?>/public/user/plugins/slick-nav/jquery.slicknav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$currentURL = $_SERVER['REQUEST_URI'];
if (strpos($currentURL, '/shop') !== false) {
    echo '<script src="' . BASE_URL . '/public/user/js/categories_custom.js"></script>';
    echo '<script src="' . BASE_URL . '/public/user/js/paging.js"></script>';
    echo '<script src="' . BASE_URL . '/public/user/js/jquery.twbsPagination.js"></script>';
} elseif (strpos($currentURL, '/product') !== false) {
    echo '<script src="' . BASE_URL . '/public/user/js/single_custom.js"></script>';
} elseif (strpos($currentURL, '/contact') !== false) {
    echo '<script src="' . BASE_URL . '/public/user/js/contact_custom.js"></script>';
    echo '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>';
} elseif (strpos($currentURL, '/user') !== false) {
    echo '<script src="' . BASE_URL . '/public/user/js/profile.js"></script>';
} elseif (strpos($currentURL, '/index') !== false || strpos($currentURL, '/') !== false) {
    echo '<script src="' . BASE_URL . '/public/user/js/custom.js"></script>';
}

?>
</body>

</html>