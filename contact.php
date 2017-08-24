<?php

$page = 'contact';

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
        $marketing = $_POST['marketing'];

        $to = $myemail;

        $email_subject = "Contact Form Submission [dkwebdesign.com]";
        $email_body = "You have received a new contact form submission from the DK Web Design website. ".
        "Here are the details:\n\n Name: $name \n Email: $email_address \n Business Name: $business \n Phone Number: $phone \n How did you hear about us: $marketing\n\n Message: \n $message"; //if you added fields to the form, add them here too!

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
                <h2>Contact</h2>
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

                <h1>Contact Our Team</h1>
                <h2 class="dk_bot_mar_0">We'd Love to Have You for Coffee</h2>
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
                            <input type="tel" name="phone" value="<?php echo $phone; ?>" id="phone" />
                        </div>

                        <div class="large-12 medium-12 small-12 columns">
                            <label id="message">Question or Comment</label>
                            <textarea name="message" rows="6" cols="30" class="message"><?php echo $message; ?></textarea>

                            <div class="dk_select_box">
                                <label id="select-marketing">Where Did You Hear About Us?</label>
                                <select name="marketing" value="<?php echo $marketing; ?>" id="marketing">
                                    <option selected disabled>Please Select Your Answer</option>
                                    <option value="Internet Search">Internet Search</option>
                                    <option value="Social Media">Social Media (FB, Yelp, etc)</option>
                                    <option value="Word of Mouth">Word of Mouth</option>
                                    <option value="Golf Scorecard">Golf Scorecard</option>
                                    <option value="Saw Another Site">I Saw Another Site You Did</option>
                                </select>
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
            <div class="large-4 medium-12 small-12 columns dk_secondary_sidebar dk_contact_sidebar">
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns">
                        <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.157164297894!2d-121.8576965846239!3d39.75857957944711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8082d87d8f6e9cf3%3A0xba5ee4087ba205cd!2s383+Connors+Ct%2C+Chico%2C+CA+95926!5e0!3m2!1sen!2sus!4v1481304514402" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <p>From highway 99, take the East Avenue exit. If you are traveling South, turn right after exiting. If you are traveling North, turn left after exiting. Turn left on Connors Ave. Turn left at the stop sign onto Connors Court. Our office will be on your right!</p>
                    </div>
                    <div class="large-12 medium-6 small-12 columns">
                        <h2>Mailing Address</h2>
                        <p>DK Web Design<br>383 Connors Court Suite D<br>Chico, CA 95926</p>
                    </div>
                    <div class="large-12 medium-6 small-12 columns">
                        <h2>Hours</h2>
                        <p>Monday - Friday: 10 a.m. - 5 p.m.<br>Weekends: Closed</p>
                        <p>Additional Hours By Appointment Only</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
