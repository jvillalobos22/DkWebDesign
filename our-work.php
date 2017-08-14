<?php
    $page = 'our-work';
    include 'includes/web-projects.php';
?>

<?php include 'includes/header.php' ?>
<!-- ***** Our Work Page *************************************************** -->
<div class="dk_secondary">
    <section class="dk_hero">
        <div class="row">
            <div class="large-12 columns">
                <h2>Design Portfolio</h2>
            </div>
        </div>
    </section>
    <div class="dk_main_content dk_secondary_page dk_our_work">
        <div class="row">
            <div class="large-12 columns">
                <h1>Web Design Portfolio</h1>
                <!--
                <div class="dk_category_select">
                    <span>Select Your Category:</span>
                    <button id="web-toggle" class="dk_select_btn selected" onclick="toggleCategory('web-design')">View Web Designs</button>
                    <button id="logo-toggle" class="dk_select_btn" onclick="toggleCategory('logo-design')">Logo Design</button>
                    <button id="ba-toggle" class="dk_select_btn" onclick="toggleCategory('before-after')">View Before &amp; Afters</button>
                </div>
              -->
            </div>
        </div>
        <div class="row dk_webdesign_showcase" id="web-design"><!-- Web Design Showcase -->
            <div class="large-12 columns animated fadeIn" style="animation-delay: 500ms">
                <div class="dk_double_rule"><hr><hr></div>
                <h4>Custom Websites</h4>
                <div class="row small-up-2 medium-up-3 large-up-4 dk_custom_websites">
                    <?php foreach ($webDesignProjects as $web) { ?>
                        <?php include 'includes/website-cards.php' ?>
                    <?php } ?>
                </div>
            </div><!-- End Custom Website Section -->
            <div class="large-12 columns animated fadeIn" style="animation-delay: 1000ms"><!-- Ecommerce Section -->
                <div class="dk_double_rule"><hr><hr></div>
                <h4>Ecommerce Websites</h4>
                <div class="row small-up-2 medium-up-3 large-up-4 dk_custom_websites">
                    <?php foreach ($ecommerceProjects as $web) { ?>
                        <?php include 'includes/website-cards.php' ?>
                    <?php } ?>
                </div>
            </div><!-- End Ecommerce Section -->
            <div class="large-12 columns animated fadeIn" style="animation-delay: 1500ms"><!-- Template Section -->
                <div class="dk_double_rule"><hr><hr></div>
                <h4>Template Websites</h4>
                <div class="row small-up-2 medium-up-3 large-up-4 dk_custom_websites">
                    <?php foreach ($templateProjects as $web) { ?>
                        <?php include 'includes/website-cards.php' ?>
                    <?php } ?>
                </div>
            </div><!-- End Template Section -->
        </div><!-- End Web Design Showcase -->
        <div class="row dk_webdesign_showcase animated fadeInLeft" id="logo-design" style="animation-delay: 500ms"><!-- Logo Design Showcase -->
            <div class="large-12 columns">
                <div class="dk_double_rule"><hr><hr></div>
                <h4>Logo Design</h4>
                <div class="row small-up-2 medium-up-3 large-up-4 dk_custom_websites">
                    <?php foreach ($webDesignProjects as $web) { ?>
                        <?php include 'includes/website-cards.php' ?>
                    <?php } ?>
                </div>
            </div>
        </div><!-- End Logo Design Showcase -->
        <div class="row dk_webdesign_showcase animated zoomIn" id="before-after" style="animation-delay: 500ms"><!-- Before/After Showcase -->
            <div class="large-12 columns">
                <div class="dk_double_rule"><hr><hr></div>
                <h4>Before &amp; After</h4>
                <div class="row small-up-2 medium-up-3 large-up-4 dk_custom_websites">
                    <?php foreach ($webDesignProjects as $web) { ?>
                        <?php include 'includes/website-cards.php' ?>
                    <?php } ?>
                </div>
            </div>
        </div><!-- End Before/After Showcase -->
    </div>
</div>

<?php include 'includes/footer.php' ?>
