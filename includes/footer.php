    <footer class="dk_footer">
        <div class="dk_footer_top">
            <div class="row">
                <div class="large-12 columns">
                    <h2>Get the website you need to reach your business goals.</h2>
                    <div class="dk_social">
                        <a class="dk_facebook" href="https://www.facebook.com/dkdesignsca/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <a class="dk_linkedin" href="https://www.linkedin.com/company/dk-web-design-llc" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a class="dk_yelp" href="https://www.yelp.com/biz/dk-web-design-chico-2" target="_blank"><i class="fa fa-yelp" aria-hidden="true"></i></a>
                        <a class="dk_google" href="https://www.google.com/search?q=dk+web+design&lrd=0x8082d85fd7b2a307:0x3fe1b0a7d3f9f455,1,&cad=h" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a class="dk_instagram" href="https://www.instagram.com/dkwebdesign/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dk_footer_bottom">
            <div class="row">
                <div class="large-6 medium-6 small-12 columns dk_copyright">
                    <p>383 Connors Court Suite D, Chico CA 95926 <span class="dk_hide_small">|</span> <a class="dk_phone" href="tel:+15308094989">530&#8209;809&#8209;4989</a></p>
                    <p>&copy; <?php echo date("Y") ?> DK Web Design. All Rights Reserved.</p>
                    <a href="privacy-policy.php">View Our Privacy Policy</a>
                </div>
                <div class="large-6 medium-6 small-12 columns dk_bbb">
                    <p><a target="_blank" title="DK Web Design BBB Business Review" href="http://www.bbb.org/northeast-california/business-reviews/web-design/dk-web-design-in-chico-ca-90018837/#bbbonlineclick"><img alt="DK Web Design BBB Business Review" style="border: 0;" src="https://seal-necal.bbb.org/seals/blue-seal-293-61-whitetxt-dk-web-design-90018837.png" /></a></p>
                </div>
            </div>
        </div>
    </footer>
</div><!-- /off-canvas-content -->

    <!-- Local Host -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/what-input/dist/what-input.min.js"></script>
    <script src="bower_components/foundation-sites/dist/js/foundation.min.js"></script>

    <!-- <script src="//code.jquery.com/jquery-2.1.4.min.js"></script> -->
    <!-- Server -->
    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script> -->

    <script src="js/app.js"></script>
    <script src="js/unslider-min.js"></script>

    <?php if($page == 'about') { ?>
    <script src="js/employee-module.js"></script>
    <?php } ?>

    <script>
    jQuery(document).ready(function($) {
        $('.my-slider').unslider({
            autoplay: true,
            delay: 5000,
            arrows: false,
            nav: false
        });
    });
    </script>
  </body>
</html>
