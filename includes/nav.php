<li><a class="<?php if($page == "home") { echo 'dk_selected'; } ?>" href="index">Home</a></li>
<li><a class="<?php if($page == "about") { echo 'dk_selected'; } ?>" href="about">About</a></li>
<li>
    <a class="<?php if($page == "services" || $pageGroup == "services") { echo 'dk_selected'; } ?>" href="services">Services</a>
    <ul class="menu vertical">
        <li><a class="dk_hide_desktop <?php if($page == "services") { echo 'dk_selected'; } ?>" href="services">Services</a>
        <li><a class="<?php if($page == "design") { echo 'dk_selected'; } ?>" href="web-design-services-in-chico">Web Design and Develpment</a></li>
        <li><a class="<?php if($page == "optimization") { echo 'dk_selected'; } ?>" href="seo-and-marketing">Optimization and Marketing</a></li>
        <!--<li><a class="<?php if($page == "app") { echo 'dk_selected'; } ?>" href="app-development">Web and App Development</a></li>-->
        <li><a class="<?php if($page == "givingback") { echo 'dk_selected'; } ?>" href="giving-back-to-chico">Giving Back to Chico</a></li>
    </ul>
</li>
<li><a class="<?php if($page == "our-work") { echo 'dk_selected'; } ?>" href="our-work">Our Work</a></li>
<li><a class="<?php if($page == "reviews") { echo 'dk_selected'; } ?>" href="reviews">Reviews</a></li>
<li><a class="<?php if($page == "blog") { echo 'dk_selected'; } ?>" href="https://www.dkwebdesign.com/blog/">Blog</a></li>
<li><a class="<?php if($page == "contact" || $pageGroup == "contact") { echo 'dk_selected'; } ?>" href="contact">Contact</a>
	<ul class="menu vertical">
        <li><a class="dk_hide_desktop <?php if($page == "contact" || $pageGroup == "contact") { echo 'dk_selected'; } ?>" href="contact">Contact</a></li>
        <li><a class="<?php if($page == "pay" || $pageGroup == "contact") { echo 'dk_selected'; } ?>" href="payments">Pay Your Bill</a></li>
    </ul>
</li>
