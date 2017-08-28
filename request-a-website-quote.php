<?php
$page = 'request-a-quote';
$title = 'Request a Quote';
$metaDesc = '';
$metaKeys = '';

$showform = true;
$errors = '';
$myemail = 'danielle@dkwebdesign.com';  //replace with client's email address after testing is complete

if($_SERVER["REQUEST_METHOD"] === "POST") {
    //form submitted
    //check if other form details are correct
    //verify captcha
    $recaptcha_secret = "6LfXaiETAAAAAMxMIQIV0LoiQskEa7qjh69Y9H6V"; /* place secret key here */
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
    $response = json_decode($response, true);
    if($response["success"] === true) {
        // SETS VARIABLES FROM USER INPUT
        $name = $_POST['name'];
        $email_address = $_POST['email'];
        $business = $_POST['business'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $services = $_POST['services'];

        $servicesString = '';
        $counter = 0;
        foreach ($services as $service) {
            if($counter == 0) {
                $servicesString = $service;
            } else {
                $servicesString .= ', ' . $service;
            }
            $counter++;
        }

        $to = $myemail;

        $email_subject = "Request a Quote Form Submission [dkwebdesign.com]";
        $email_body = "You have received a new contact form submission from the DK Web Design website. ".
        "Here are the details:\n\n Name: $name \n Email: $email_address \n Business Name: $business \n Phone Number: $phone \n\n What are your goals for your website/business: \n $message \n\n Services: \n $servicesString"; //if you added fields to the form, add them here too!

        $headers = "From: $myemail\n";
        $headers .= "Reply-To: $email_address";

        mail($to, $email_subject, $email_body, $headers);

        $success = "<h2>You're One Step Closer to an Awesome Website</h2><p>Thank you for reaching out. A member of our team will be in contact with you shortly.</p>";
	    $showform = false;
        unset($_POST);
        echo '<meta http-equiv="refresh" content="5;url="';  //make sure this url is the same url you are using for your contact page

        //redirect to the 'thank you' page
        //header('Location: redirect url');
    } else {
        $errors .= "\n <p style='color:#FF0000; font-weight:bold; margin-bottom:20px;'>Error: Invalid security check. You are a robot.</p>";
    }
}
?>
<?php include 'includes/header.php' ?>
<!-- ***** Contact Page **************************************************** -->
<div class="dk_secondary dk_contact_page">
    <section class="dk_hero">
        <div class="row">
            <div class="large-12 columns">
                <h2>Request a Quote</h2>
            </div>
        </div>
    </section>

    <div class="dk_main_content dk_secondary_page dk_contact">
        <div class="row">
            <div class="large-8 medium-12 small-12 columns">
                <!-- Start Contact Form -->
                <?php
                    if ($showform) { echo nl2br($errors);
                ?>

                <h1>Request a Quote</h1>
                <h2 class="dk_bot_mar_0">See How DK Web Design Can Help Your Business</h2>
                <p>* required field</p>

                <div id="form">
                    <form name="contactform" method="post" action="" class="contact-form row">

                        <div class="contact-box large-6 medium-6 small-12 columns">
                            <label id="name">Name*</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" id="name" required />
                        </div>

                        <div class="contact-box large-6 medium-6 small-12 columns">
                            <label id="email">Email Address*</label>
                            <input type="email" name="email" value="<?php echo $email_address; ?>" id="email" required/>
                        </div>

                        <div class="contact-box large-6 medium-6 small-12 columns">
                            <label id="business">Business Name*</label>
                            <input type="text" name="business" value="<?php echo $business; ?>" id="business" required/>
                        </div>

                        <div class="contact-box large-6 medium-6 small-12 columns">
                            <label id="phone">Phone Number</label>
                            <input type="tel" name="phone" value="<?php echo $phone; ?>" id="phone"/>
                        </div>

                        <div class="large-12 medium-12 small-12 columns">
                            <label id="message">What are your goals for your website/business?</label>
                            <textarea name="message" rows="6" cols="30" class="message"><?php echo $message; ?></textarea>

                            <div class="dk_select_box">
                                <p>What Services Are You Interested In?</p>
                                  <input type="checkbox" name="services[]" id="dk_services_checkbox" value="Free Consultation"/> Free Consultation<br />
                                  <input type="checkbox" name="services[]" id="dk_services_checkbox" value="Website Creation/Redesign" /> Website Creation/Redesign <br />
                                  <input type="checkbox" name="services[]" id="dk_services_checkbox" value="SEO" /> Search Engine Optimization<br />
                                  <input type="checkbox" name="services[]" id="dk_services_checkbox" value="Social Media Management" /> Social Media Management<br />
                                  <input type="checkbox" name="services[]" id="dk_services_checkbox" value="Other" /> Other<br />
                            </div>

                            <div class="g-recaptcha" data-sitekey="6LfXaiETAAAAAIvHDPW3VAAShcRFmh-waNeBXX-E"></div> <!-- data-sitekey= public key -->
                            <input name="send_message" type="submit" class="dk_button dk_primary" onclick="myFunction()" value="Send My Message" id="send_message" border="0" />
                        </div>
                    </form>
                </div>

                <?php
                    } else { echo nl2br($success); }
                ?>
                <!-- End Contact Form -->
            </div>
            <div class="large-4 medium-12 small-12 columns dk_secondary_sidebar">
                <div class="row">
                    <div class="large-12 medium-5 small-12 columns">
                        <img src="img/the-mattress-haven-chico.jpg" alt="The Mattress Haven in Chico, CA sells a variety of mattresses and is family owned!">
                    </div>
                    <div class="large-12 medium-7 small-12 columns">
                    <h2>We Love Happy Clients</h2>
                        <p>"I would like to thank DK Web Design for their hard work and beautiful design of our website. They have played a huge part behind the scenes in the start of our business. Thank you!" - Kenny Atwal, Owner of <a href="http://www.themattresshaven.com" target="_blank">The Mattress Haven</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
