<?php
$page='pay';

// API Setup parameters
$gatewayURL = 'https://paymentdepot.transactiongateway.com/api/v2/three-step';
$APIKey = 'dk3XT7843vFrz6CZ43v758ybe2Xgsk53';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/payment-page-styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

<title>DK Web Design</title>

<?php include 'includes/header.php' ?>
<?php include 'includes/top.php' ?>

<!---------------------------------------------------->

<div class="wrapper-secondary">

    <div class="main-secondary dk_pay_page">
        <?php if (empty($_POST['DO_STEP_1']) && empty($_GET['token-id'])) { ?>
            <h1>Make A Payment</h1>
            <hr>
            <h2>Step One: Let's find your invoice and get some basic info</h2>
            <p class="dk_add_bot_pad">*Required</p>

            <form action="" method="post" class="dk_payment_form">
                <fieldset class="dk_payment_find_invoice">
                    <legend>Invoice Details &amp; Contact Info</legend>
                    <div>
                        <label>Invoice Number*</label><input type="text" name="invoice-number" value="" required>
                    </div>
                    <div>
                        <label>Payment Amount*</label><input type="number" min="1" step="any" name="payment-amount" value="" required>
                    </div>
                    <div>
                        <label>Phone Number</label><input type="tel" name="billing-address-phone" placeholder="555-555-5555">
                    </div>
                    <div>
                        <label>Email Address*</label><input type="email" name="billing-address-email" placeholder="john@example.com" required>
                    </div>
                </fieldset>
                <fieldset class="dk_payment_customer_info">
                    <legend>Billing Address</legend>
                    <div>
                        <label>Company*</label><input type="text" name="billing-address-company" required>
                    </div>
                    <div>
                        <label>First Name*</label><input type="text" name="billing-address-first-name" required>
                    </div>
                    <div>
                        <label>Last Name*</label><input type="text" name="billing-address-last-name" required>
                    </div>
                    <div>
                        <label>Address </label><input type="text" name="billing-address-address1" >
                    </div>
                    <div>
                        <label>Address 2 </label><input type="text" name="billing-address-address2" >
                    </div>
                    <div>
                        <label>City </label><input type="text" name="billing-address-city" >
                    </div>
                    <div>
                        <label>Zip/Postal </label><input type="text" name="billing-address-zip" >
                    </div>
                    <div>
                        <label>State/Province </label><!-- <input type="text" name="billing-address-state" value="CA"> -->
                        <select name="billing-address-state" value="CA">
                            <option selected disabled >Select a State</option>
                        	<option value="AL">Alabama</option>
                        	<option value="AK">Alaska</option>
                        	<option value="AZ">Arizona</option>
                        	<option value="AR">Arkansas</option>
                        	<option value="CA">California</option>
                        	<option value="CO">Colorado</option>
                        	<option value="CT">Connecticut</option>
                        	<option value="DE">Delaware</option>
                        	<option value="DC">District Of Columbia</option>
                        	<option value="FL">Florida</option>
                        	<option value="GA">Georgia</option>
                        	<option value="HI">Hawaii</option>
                        	<option value="ID">Idaho</option>
                        	<option value="IL">Illinois</option>
                        	<option value="IN">Indiana</option>
                        	<option value="IA">Iowa</option>
                        	<option value="KS">Kansas</option>
                        	<option value="KY">Kentucky</option>
                        	<option value="LA">Louisiana</option>
                        	<option value="ME">Maine</option>
                        	<option value="MD">Maryland</option>
                        	<option value="MA">Massachusetts</option>
                        	<option value="MI">Michigan</option>
                        	<option value="MN">Minnesota</option>
                        	<option value="MS">Mississippi</option>
                        	<option value="MO">Missouri</option>
                        	<option value="MT">Montana</option>
                        	<option value="NE">Nebraska</option>
                        	<option value="NV">Nevada</option>
                        	<option value="NH">New Hampshire</option>
                        	<option value="NJ">New Jersey</option>
                        	<option value="NM">New Mexico</option>
                        	<option value="NY">New York</option>
                        	<option value="NC">North Carolina</option>
                        	<option value="ND">North Dakota</option>
                        	<option value="OH">Ohio</option>
                        	<option value="OK">Oklahoma</option>
                        	<option value="OR">Oregon</option>
                        	<option value="PA">Pennsylvania</option>
                        	<option value="RI">Rhode Island</option>
                        	<option value="SC">South Carolina</option>
                        	<option value="SD">South Dakota</option>
                        	<option value="TN">Tennessee</option>
                        	<option value="TX">Texas</option>
                        	<option value="UT">Utah</option>
                        	<option value="VT">Vermont</option>
                        	<option value="VA">Virginia</option>
                        	<option value="WA">Washington</option>
                        	<option value="WV">West Virginia</option>
                        	<option value="WI">Wisconsin</option>
                        	<option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <!--<div>
                        <label>Country </label><input type="text" name="billing-address-country" value="US">
                    </div>-->
                </fieldset>
                <p class="mybutton">
                    <input type="submit" value="Proceed to Step 2"><input type="hidden" name="DO_STEP_1" value="true">
                </p>
            </form>

            <?php }else if (!empty($_POST['DO_STEP_1'])) {

                // Initiate Step One: Now that we've collected the non-sensitive payment information, we can combine other order information and build the XML format.
                $xmlRequest = new DOMDocument('1.0','UTF-8');

                $xmlRequest->formatOutput = true;
                $xmlSale = $xmlRequest->createElement('sale');

                // Amount, authentication, and Redirect-URL are typically the bare minimum.
                appendXmlNode($xmlRequest, $xmlSale,'api-key',$APIKey);
                appendXmlNode($xmlRequest, $xmlSale,'redirect-url',$_SERVER['HTTP_REFERER']);
                appendXmlNode($xmlRequest, $xmlSale, 'amount', $_POST['payment-amount']);
                appendXmlNode($xmlRequest, $xmlSale, 'ip-address', $_SERVER["REMOTE_ADDR"]);
                //appendXmlNode($xmlRequest, $xmlSale, 'processor-id' , 'processor-a');
                appendXmlNode($xmlRequest, $xmlSale, 'currency', 'USD');

                // Some additonal fields may have been previously decided by user
                appendXmlNode($xmlRequest, $xmlSale, 'order-id', $_POST['invoice-number']);
                appendXmlNode($xmlRequest, $xmlSale, 'order-description', 'Small Order');


                // Set the Billing and Shipping from what was collected on initial shopping cart form
                $xmlBillingAddress = $xmlRequest->createElement('billing');
                appendXmlNode($xmlRequest, $xmlBillingAddress,'first-name', $_POST['billing-address-first-name']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'last-name', $_POST['billing-address-last-name']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'address1', $_POST['billing-address-address1']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'city', $_POST['billing-address-city']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'state', $_POST['billing-address-state']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'postal', $_POST['billing-address-zip']);
                //billing-address-email
                appendXmlNode($xmlRequest, $xmlBillingAddress,'country', 'US');//$_POST['billing-address-country']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'email', $_POST['billing-address-email']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'phone', $_POST['billing-address-phone']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'company', $_POST['billing-address-company']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'address2', $_POST['billing-address-address2']);
                appendXmlNode($xmlRequest, $xmlBillingAddress,'fax', $_POST['billing-address-fax']);
                $xmlSale->appendChild($xmlBillingAddress);

                // Products already chosen by user
                $xmlProduct = $xmlRequest->createElement('product');
                appendXmlNode($xmlRequest, $xmlProduct,'product-code' , 'Invoice: ' . $_POST['invoice-number']);

                $xmlSale->appendChild($xmlProduct);


                $xmlRequest->appendChild($xmlSale);

                // Process Step One: Submit all transaction details to the Payment Gateway except the customer's sensitive payment information.
                // The Payment Gateway will return a variable form-url.
                $data = sendXMLviaCurl($xmlRequest,$gatewayURL);

                // Parse Step One's XML response
                $gwResponse = @new SimpleXMLElement($data);
                if ((string)$gwResponse->result ==1 ) {
                    // The form url for used in Step Two below
                    $formURL = $gwResponse->{'form-url'};
                } else {
                    throw New Exception(print " Error, received " . $data);
                }

                // Initiate Step Two: Create an HTML form that collects the customer's sensitive payment information
                // and use the form-url that the Payment Gateway returns as the submit action in that form.

            ?>

            <?php
                // Uncomment the line below if you would like to print Step One's response
                // print '<pre>' . (htmlentities($data)) . '</pre>';
            ?>

            <h1>Make A Payment</h1>
            <hr>
            <h2 class="">Step Two: Enter your credit card details</h2>
            <p class="dk_add_bot_pad dk_cc_note">DK Web Design does not collect or store any of your credit card details. All transactions are handled securely through our payment processor.</p>



            <form action="<?php echo $formURL ?>" class="dk_payment_form" method="POST">
                <fieldset class="dk_payment_card_info">
                    <legend>Payment Information</legend>
                    <div class="dk_cc_number">
                        <label>Credit Card Number</label>
                        <input type="text" max-length="16" name="billing-cc-number" onblur="
                        cc_number_saved = this.value;
                        this.value = this.value.replace(/[^\d]/g, '');
                        if(!checkLuhn(this.value)) {
                            document.getElementById('cc_error').innerHTML = 'Sorry, but this is not a valid credit card number. Please try again.';
                            document.getElementById('cc_type_error').innerHTML = '';
                            this.value = '';
                        } else {
                            document.getElementById('cc_error').innerHTML = '';

                            if(!checkCreditCardType(this.value)) {
                                document.getElementById('cc_type_error').innerHTML = 'Sorry, we only accept Mastercard and Visa.';
                            } else {
                                document.getElementById('cc_type_error').innerHTML = '';
                            }
                        }
                        " onfocus="
                        if(this.value != cc_number_saved) this.value = cc_number_saved;
                        " placeholder="4111111111111111" required>
                        <i class="fa fa-cc-visa" id="visa-logo" aria-hidden="true"></i>
                        <i class="fa fa-cc-mastercard" id="mastercard-logo" aria-hidden="true"></i>
                        <p id="cc_error"></p>
                        <p id="cc_type_error"></p>
                    </div>
                    <div class="dk_cc_exp">
                        <label>Expiration Date</label>
                        <input type="text" name="billing-cc-exp" onblur="
                        cc_expiration_saved = this.value;
                        this.value = this.value.replace(/[^\d]/g, '');
                        " onfocus="
                        if(this.value != cc_expiration_saved) this.value = cc_expiration_saved;
                        " placeholder="MM / YY" required>

                    </div>
                    <div class="dk_cc_security">
                        <label>Security Code</label>
                        <input type="text" maxlength="3" name="cvv" pattern="(\d){3}" placeholder="111" required>
                    </div>

                </fieldset>
                <p class="mybutton">
                    <input type="submit" value="Make Payment"><input type="hidden" name="DO_STEP_1" value="true">
                </p>

            </form>

            <?php } elseif (!empty($_GET['token-id'])) {

                // Step Three: Once the browser has been redirected, we can obtain the token-id and complete
                // the transaction through another XML HTTPS POST including the token-id which abstracts the
                // sensitive payment information that was previously collected by the Payment Gateway.
                $tokenId = $_GET['token-id'];
                $xmlRequest = new DOMDocument('1.0','UTF-8');
                $xmlRequest->formatOutput = true;
                $xmlCompleteTransaction = $xmlRequest->createElement('complete-action');
                appendXmlNode($xmlRequest, $xmlCompleteTransaction,'api-key',$APIKey);
                appendXmlNode($xmlRequest, $xmlCompleteTransaction,'token-id',$tokenId);
                $xmlRequest->appendChild($xmlCompleteTransaction);


                // Process Step Three
                $data = sendXMLviaCurl($xmlRequest,$gatewayURL);

                $gwResponse = @new SimpleXMLElement((string)$data);
            ?>

                <!-- <p><h2>Step Three: Script automatically completes the transaction <br /></h2></p> -->
            <?php
                if ((string)$gwResponse->result == 1 ) {
                    //print " <p><h3> Transaction was Approved, XML response was:</h3></p>\n";

                    // Uncomment line to see full XML response
                    //print '<pre>' . (htmlentities($data)) . '</pre>';

                    $details = new SimpleXMLElement($data);

                    ?>
                    <!-- Successful Payment -->
                    <div class="dk_payment_approved">
                        <h2>Thanks <?php echo $details->billing->{'first-name'} ?>, your payment on invoice <span class="dk_invoice_number blue"><?php echo $details->{'order-id'}; ?></span> was approved.</h2>
                        <h3>Payment Amount: <strong class="blue">$<?php echo $details->{'amount'}; ?></strong></h3>
                        <h3>Thanks for working with us!</h3>
                    </div>
            <?php

                } elseif((string)$gwResponse->result == 2)  {
                    print " <p><h3> Transaction was Declined.</h3>\n";
                    print " Decline Description : " . (string)$gwResponse->{'result-text'} ." </p>";
                    //print " <p><h3>XML response was:</h3></p>\n";
                    //print '<pre>' . (htmlentities($data)) . '</pre>';
                } else {
                    print " <p><h3> Transaction caused an Error.</h3>\n";
                    print " Error Description: " . (string)$gwResponse->{'result-text'} ." </p>";
                    //print " <p><h3>XML response was:</h3></p>\n";
                    //print '<pre>' . (htmlentities($data)) . '</pre>';
                }
            ?>

            <?php
            } else {
              print "ERROR IN SCRIPT<BR>";
            }
            ?>




    </div><!-- end main -->

    <div class="sidebar">
        <h2>Office Address</h2>
        <p>DK Web Design, LLC<br />
           383 Connors Court Suite D<br />
           Chico, CA 95926</p>
        <br /><br />
		<h2>Hours</h2>
        <p>Mon-Fri 10am-5pm<br />Additional hours by appointment only</p>
        <br /><br />
    </div>

    <script src="js/payment-validation.js"></script>
  <?php include 'includes/footer.php' ?>


<?php
function sendXMLviaCurl($xmlRequest,$gatewayURL) {
    // helper function demonstrating how to send the xml with curl


    $ch = curl_init(); // Initialize curl handle
    curl_setopt($ch, CURLOPT_URL, $gatewayURL); // Set POST URL

    $headers = array();
    $headers[] = "Content-type: text/xml";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Add http headers to let it know we're sending XML
    $xmlString = $xmlRequest->saveXML();
    curl_setopt($ch, CURLOPT_FAILONERROR, 1); // Fail on errors
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return into a variable
    curl_setopt($ch, CURLOPT_PORT, 443); // Set the port number
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Times out after 30s
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlString); // Add XML directly in POST

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);


    // This should be unset in production use. With it on, it forces the ssl cert to be valid
    // before sending info.
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    if (!($data = curl_exec($ch))) {
      print  "curl error =>" .curl_error($ch) ."\n";
      throw New Exception(" CURL ERROR :" . curl_error($ch));

    }
    curl_close($ch);

    return $data;
}

// Helper function to make building xml dom easier
function appendXmlNode($domDocument, $parentNode, $name, $value) {
    $childNode      = $domDocument->createElement($name);
    $childNodeValue = $domDocument->createTextNode($value);
    $childNode->appendChild($childNodeValue);
    $parentNode->appendChild($childNode);
}
?>
