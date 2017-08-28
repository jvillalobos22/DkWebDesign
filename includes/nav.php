<li><a class="<?php if($page == "home") { echo 'dk_selected'; } ?>" href="index.php">Home</a></li>
<li><a class="<?php if($page == "about") { echo 'dk_selected'; } ?>" href="about.php">About</a></li>
<li>
    <a class="<?php if($page == "services" || $pageGroup == "services") { echo 'dk_selected'; } ?>" href="services.php">Services</a>
    <ul class="menu vertical">
        <li><a class="dk_hide_desktop <?php if($page == "services") { echo 'dk_selected'; } ?>" href="services.php">Services</a>
        <li><a class="<?php if($page == "design") { echo 'dk_selected'; } ?>" href="web-design-services-in-chico.php">Web Design and Develpment</a></li>
        <li><a class="<?php if($page == "optimization") { echo 'dk_selected'; } ?>" href="seo-and-marketing.php">Optimization and Marketing</a></li>
        <!--<li><a class="<?php if($page == "app") { echo 'dk_selected'; } ?>" href="app-development.php">Web and App Development</a></li>-->
        <li><a class="<?php if($page == "givingback") { echo 'dk_selected'; } ?>" href="giving-back-to-chico.php">Giving Back to Chico</a></li>
    </ul>
</li>
<li><a class="<?php if($page == "our-work") { echo 'dk_selected'; } ?>" href="our-work.php">Our Work</a></li>
<li><a class="<?php if($page == "reviews") { echo 'dk_selected'; } ?>" href="reviews.php">Reviews</a></li>
<li><a class="<?php if($page == "blog") { echo 'dk_selected'; } ?>" href="https://www.dkwebdesign.com/blog/">Blog</a></li>
<li><a class="<?php if($page == "contact" || $pageGroup == "contact") { echo 'dk_selected'; } ?>" href="contact.php">Contact</a>
	<ul class="menu vertical">
        <li><a class="dk_hide_desktop <?php if($page == "contact" || $pageGroup == "contact") { echo 'dk_selected'; } ?>" href="contact.php">Contact</a></li>
        <li><a class="<?php if($page == "pay" || $pageGroup == "contact") { echo 'dk_selected'; } ?>" href="payments.php">Pay Your Bill</a></li>
    </ul>
</li>
