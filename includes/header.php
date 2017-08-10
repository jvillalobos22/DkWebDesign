<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DK Web Design</title>
    <script src="https://use.fontawesome.com/1b6c5f7bcd.js"></script>
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/app.css">

    <script src='https://www.google.com/recaptcha/api.js'></script> <!-- Must be present in head of page -->
  </head>
  <body>
    <!-- Facebook SDK -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1743043165981672";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- End Facebook SDK -->

    <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas position-left" id="offCanvas" data-off-canvas data-transition-time="500">
            <!-- Your menu or Off-canvas content goes here -->
            <!-- Close button -->
            <button class="close-button" aria-label="Close menu" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>

            <!-- Menu -->
            <ul class="vertical menu drilldown" data-drilldown>
                <?php include('includes/nav.php'); ?>
            </ul>
        </div>

        <div class="off-canvas-content" data-off-canvas-content>
            <!-- Your page content lives here -->
            <header class="dk_header">
                <div class="row">
                    <a href="index.php" class="animated rollIn">
                        <img class="dk_horizlogo" src="img/dkwd-horiz-whitetext.png" alt="DK Web Design Logo">
                        <!-- <img src="img/dkwd-RGB-whitetext.png" alt="DK Web Design Logo"> -->
                    </a>
                    <div class="dk_header_right animated flipInX" style="animation-delay: 1s">
                        <!-- <h2>Website Design <span class="dk_secondary_color">&amp;</span> Business Development</h2>
                        <h4 class="dk_uppers">Schedule a Consultation</h4>
                        <a class="dk_phone" href="tel:+15308094989">530.809.4989</a> -->
                        <a class="dk_phone large" href="tel:+15308094989">530.809.4989</a>
                        <h5 class="dk_uppers">Located in Chico, CA</h5>
                    </div>
                </div>
            </header>
            <nav class="dk_nav">
                <div class="dk_mobile_topbar">
                    <div class="row">
                        <!-- <button class="dk_responsive_toggle" type="button" data-toggle="offCanvas">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            Main Menu
                        </button> -->
                        <button type="button" class="dk_responsive_toggle" data-toggle="offCanvas"><i class="fa fa-bars" aria-hidden="true"></i>
                        Menu</button>
                        <a class="dk_nav_callout_btn" href="#">Request a Quote</a>
                        <!--<div class="title-bar-title">Main Menu</div>-->
                    </div>
                </div>
                <div class="dk_desktop_topbar">
                    <div class="row">
                        <div class="large-12 columns">
                            <ul class="dk_desktopnav dropdown large-horizontal medium-vertical vertical menu" data-dropdown-menu>
                                <?php include('includes/nav.php'); ?>
                            </ul>
                            <a class="dk_nav_callout_btn" href="request-a-website-quote.php">Request a Quote</a>
                        </div>
                    </div>
                </div>
            </nav>
