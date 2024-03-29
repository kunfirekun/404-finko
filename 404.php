<?php
require_once "config.php";
require_once "engine.php";
	$msg = "";
	use PHPMailer\PHPMailer\PHPMailer;

	if (isset($_POST['submit'])) {
		
		
		
        $email = getEncryptedUserEmail();
        $ip_address = getEncryptedUserIpAddr();
        $discount_code = getDiscountCode();

        // Get a date and time
        date_default_timezone_set("Africa/Nairobi");
        $time=date("d.m.Y, h:i:sa");


		if ( $email == "" )
			$msg = "<span class='spandanger'>Please Check Your Inputs!</span>";
		else {
			$sql = $con->query("SELECT s_id FROM subscription WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "<span class='spandanger'>You Have Already Subscribed!</span>";
			} else {
			
				$con->query("INSERT INTO subscription (email,user_address,discount_code,discount_status,entry_time,used_time,acc_status)
					VALUES ('$email', '$ip_address','$discount_code', 'unused','$time','0','1');
				");

                include_once "PHPMailer/PHPMailer.php";

                $mail = new PHPMailer();
                $mail->setFrom('no-reply@finkosuppliesagencies.com');
                $mail->addAddress($email_validated);
                $mail->Subject = "Subscription Confirmed!";
                $mail->isHTML(true);
                $mail->Body = '
                    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title>Finko Supplies Subscription</title> 

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
    <link rel="icon" href="https://finkosuppliesagencies.com/assets/images/favicon/2.png" type="image/x-icon">

    <!-- CSS Reset : BEGIN -->
    <style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 600;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:  5px;
}

.button2 {background-color: #012388;} /* Blue */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}


img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */


/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

	    .primary{
	background: #2f89fc;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

/*BUTTON*/
.btn{
	padding: 5px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #2f89fc;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}

h1,h2,h3,h4,h5,h6{
	font-family: "Work Sans", sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: "Work Sans", sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #2f89fc;
}

table{
}
/*LOGO*/

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #000000;
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
	font-family: "Poppins", sans-serif;
}

.navigation{
	padding: 0;
}
.navigation li{
	list-style: none;
	display: inline-block;;
	margin-left: 5px;
	font-size: 13px;
	font-weight: 500;
}
.navigation li a{
	color: rgba(0,0,0,.4);
}

/*HERO*/
.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 30px;
	margin-bottom: 0;
	font-weight: 300;
}
.hero .text h2 span{
	font-weight: 600;
	color: #2f89fc;
}


/*HEADING SECTION*/
.heading-section{
}
.heading-section h2{
	color: #000000;
	font-size: 28px;
	margin-top: 0;
	line-height: 1.4;
	font-weight: 400;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	content: "";
	width: 100%;
	height: 2px;
	background: #2f89fc;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	font-family: 
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: #ffffff;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}

/*PROJECT*/
.text-project{
	padding-top: 10px;
}
.text-project h3{
	margin-bottom: 0;
}
.text-project h3 a{
	color: #000;
}

/*FOOTER*/

.footer{
	color: rgba(255,255,255,.5);

}
.footer .heading{
	color: #ffffff;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(255,255,255,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
          			<td class="logo" style="text-align: center;">
			            <h1><img src="https://finkosuppliesagencies.com/logo-newsletter.png" style="width:auto; height: 50px;"></h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero hero-2 bg_white" style="padding: 1em 0;">
            <table>
            	<tr>
            		<td>
            			<div class="text" style="padding: 0 3em; text-align: center;">
            				<h2>Thank You For Subscribing To Finko Supplies Agencies. Your Discount Code Is<span> '."$discount_code_encode".'</span>.</h2>
            			</div>
            			 <div class="text" style="padding: 1em 0; text-align: center;">
            				<h2><a id="myLink" title="Click to do something"
 href="https://finkosuppliesagencies.com/" onclick="MyFunction();return false;"><button class="button button2" >START SHOPPING</button></a></h2>
            			</div>
            		</td>
            		
            			
            		
            	</tr>
            </table>
          </td>

	      </tr><!-- end tr -->

	    

		        </table>

		      </td>
		    </tr><!-- end:tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="middle" class="bg_black footer email-section">
            <table>
            	<tr>
                <td valign="top" width="40%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<h3 class="heading">About</h3>
                      	<p>Finko Supplies Agencies, "shop and ship" genuine products from international and local markets.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="30%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                      	<h3 class="heading">Contact Info</h3>
                      	<ul>
					                <li><span class="text">Hse 90, Sunvalley Estate Phase 1, Police Dog Unit Road, Langata ,Nairobi.</span></li>
					                
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="30%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                      	<h3 class="heading">Useful Links</h3>
                      	<ul>
					                <li><a href="https://instagram.com/finkosupplies">Instagram</a></li>
					                <li><a href="mailto:&#105;&#110;&#102;&#111;&#64;&#102;&#105;&#110;&#107;&#111;&#115;&#117;&#112;&#112;&#108;&#105;&#101;&#115;&#97;&#103;&#101;&#110;&#99;&#105;&#101;&#115;&#46;&#99;&#111;&#109;">Mail Finko</a></li>
					                <li><a href="tel:+254771950346">Call Finko</a></li>
					              
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <tr>
        	<td valign="middle" class="bg_black footer email-section">
        		<table>
            	<tr>
                <td valign="top" width="60%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<p>&copy; 2023 Finko Supplies Agency. <br>All Rights Reserved</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="40%">
                  
                </td>
              </tr>
            </table>
        	</td>
        </tr>
      </table>

    </div>
  </center>
</body>
</html>
                ';

                if ($mail->send())
                    $msg = "<span class='spansuccess'>You Have Been Subscribed Successfully !</span>";
                else
                    $msg = "<span class='spandanger'>Something wrong happened! Please try again!</span>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Finko Supplies Agencies is an online shopping platform in Kenya, selling a wide array of products ranging from home appliances, office equipment, electronics and so much more.">
    <meta name="keywords" content="Finko Supplies Agencies,online,shop, tv, decor, kitchenware, smartphone, mobile, console, furniture">
    <meta name="author" content="Eazzzy Digital">
    <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Finko Supplies Agencies | Coming Soon</title>

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../../css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="../../css2-3?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">

</head>

<body class="theme-color2 light-gray-bg">

    <!-- coming soon section start -->
    <section class="section-b-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" align="center">
                            <img src="assets/images/logo-web.webp" style="width:auto;height:50px;">
                        </div>

                <div class="col-12">

                    <div class="store-container">

                        

                        <div class="border-animation">
                            <svg xmlns="http://www.w3.org/2000/svg" id="store" viewbox="130 0 1230 930">
                                <defs>
                                    <filter id="f1">
                                        <fegaussianblur in="SourceGraphic" stddeviation="0,4"></fegaussianblur>
                                    </filter>
                                    <circle id="sky-circle" fill="none" class="stroke" cx="198.7" cy="314" r="5.5"></circle>
                                    <path id="cloud" fill="#FFF" class="stroke" d="M503.6 39.1c-2.9 0.2-5.8 0.7-8.5 1.4 -14.7-24.5-42.3-40-72.8-37.8 -31.2 2.2-56.9 22.4-67.6 49.7 -2.5-0.4-5-0.5-7.6-0.3 -18.5 1.3-32.5 17.4-31.2 35.9s17.4 32.5 35.9 31.2c2.3-0.2 4.6-0.6 6.8-1.2 14.1 26.5 42.9 43.6 74.8 41.3 23.1-1.6 43.2-13.1 56.4-30.1 6.3 2.5 13.2 3.6 20.4 3.1 25.7-1.8 45.1-24.1 43.3-49.9C551.6 56.7 529.3 37.3 503.6 39.1z"></path>
                                    <path id="cloud2" fill="#FFF" class="stroke" transform="scale(.8)" d="M503.6 39.1c-2.9 0.2-5.8 0.7-8.5 1.4 -14.7-24.5-42.3-40-72.8-37.8 -31.2 2.2-56.9 22.4-67.6 49.7 -2.5-0.4-5-0.5-7.6-0.3 -18.5 1.3-32.5 17.4-31.2 35.9s17.4 32.5 35.9 31.2c2.3-0.2 4.6-0.6 6.8-1.2 14.1 26.5 42.9 43.6 74.8 41.3 23.1-1.6 43.2-13.1 56.4-30.1 6.3 2.5 13.2 3.6 20.4 3.1 25.7-1.8 45.1-24.1 43.3-49.9C551.6 56.7 529.3 37.3 503.6 39.1z"></path>
                                    <g id="tree">
                                        <rect x="1114.2" y="721.5" fill="#8e4a17" class="stroke" width="22" height="127"></rect>
                                        <g opacity="0.4">
                                            <path fill="#599919" d="M1085.2 552.4c-29.4 14.7-49.5 45-49.5 80.1 0 49.4 40.1 89.5 89.5 89.5 49.4 0 89.5-40.1 89.5-89.5 0-35.2-20.3-65.6-49.8-80.2"></path>
                                            <path fill="#599919" d="M1164.9 552.3c10-10.1 16.1-24 16.1-39.3 0-30.9-25.1-56-56-56s-56 25.1-56 56c0 15.4 6.2 29.3 16.2 39.4"></path>
                                            <path fill="#05238a" d="M1153.9 561c4-2.4 7.7-5.4 11-8.7"></path>
                                            <path fill="#05238a" d="M1104.3 545.5c-6.7 1.6-13.1 3.9-19.1 7"></path>
                                        </g>
                                        <path fill="none" class="stroke round-end" d="M1085.2 552.4c-29.4 14.7-49.5 45-49.5 80.1 0 49.4 40.1 89.5 89.5 89.5 49.4 0 89.5-40.1 89.5-89.5 0-35.2-20.3-65.6-49.8-80.2"></path>
                                        <path fill="none" class="stroke round-end" d="M1164.9 552.3c10-10.1 16.1-24 16.1-39.3 0-30.9-25.1-56-56-56s-56 25.1-56 56c0 15.4 6.2 29.3 16.2 39.4"></path>
                                        <path fill="none" class="stroke round-end" d="M1153.9 561c4-2.4 7.7-5.4 11-8.7"></path>
                                        <path fill="none" class="stroke round-end" d="M1104.3 545.5c-6.7 1.6-13.1 3.9-19.1 7"></path>
                                    </g>
                                    <g id="cat">
                                        <circle fill="#05238a" cx="1115" cy="625" r="25"></circle>
                                        <path fill="#FFF" stroke="#05238a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1097.1 612.3c0 0-4.5-9.3-0.3-17.7 0 0 4.5 5.6 9.3 7"></path>
                                        <path fill="#FFF" stroke="#05238a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1140.6 612.3c0 0 4.5-9.3 0.3-17.7 0 0-4.5 5.6-9.3 7"></path>
                                        <circle fill="#FFF" stroke="#05238a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="1118.6" cy="621.7" r="23.1"></circle>
                                        <path fill="#ED4F43" d="M1122.4 625c0 5.3-1.4 6.3-3.8 6.3 -2.4 0-3.8-1-3.8-6.3"></path>
                                        <path fill="#FFF" stroke="#05238a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1132.8 621.2c0 3.9-3.2 7-7 7s-7-3.2-7-7h-0.2c0 3.9-3.2 7-7 7s-7-3.2-7-7"></path>
                                        <path fill="#FFF" stroke="#05238a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1104.7 613c0 0 0-3.1 2.8-3.8 2.9-0.8 4.2 1.7 4.2 1.7"></path>
                                        <path fill="#FFF" stroke="#05238a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1132.6 613c0 0 0-3.1-2.8-3.8 -2.9-0.8-4.2 1.7-4.2 1.7"></path>
                                        <path fill="#05238a" d="M1118.6 622c0 0-2.9-0.8-2.9-1.9v0c0-1 0.8-1.9 1.9-1.9h2.2c1 0 1.9 0.8 1.9 1.9v0C1121.6 621.2 1118.6 622 1118.6 622z"></path>
                                    </g>
                                    <g id="parachute">
                                        <path fill="#05238a" d="M429.4 2.5c-36.7 0-66.3 32.4-66.3 72.4 -9.3-6.7-19.4-5.9-30.1 0C333 74.9 355 2.5 429.4 2.5"></path>
                                        <path fill="#05238a" d="M429.6 2.5c36.7 0 66.3 32.4 66.3 72.4 9.3-6.7 19.4-5.9 30.1 0C526 74.9 504 2.5 429.6 2.5"></path>
                                        <path fill="#05238a" d="M429.6 2.5c15.3 0 27.6 36.5 27.7 76 -9.3-3.9-18.5-5.9-27.7-6h-0.2c-9.2 0-18.4 2.1-27.7 6 0.1-39.5 12.4-76 27.7-76"></path>
                                        <path fill="none" class="stroke" d="M401.8 78.5c0 0-13.4-14.6-38.9-3.6"></path>
                                        <path fill="none" class="stroke" d="M429.4 2.5c-36.7 0-66.3 32.4-66.3 72.4 -9.3-6.7-19.4-5.9-30.1 0C333 74.9 355 2.5 429.4 2.5"></path>
                                        <path fill="none" class="stroke" d="M429.6 2.5c36.7 0 66.3 32.4 66.3 72.4 9.3-6.7 19.4-5.9 30.1 0C526 74.9 504 2.5 429.6 2.5"></path>
                                        <path fill="none" class="stroke" d="M429.6 2.5c15.3 0 27.6 36.5 27.7 76 -9.3-3.9-18.5-5.9-27.7-6h-0.2c-9.2 0-18.4 2.1-27.7 6 0.1-39.5 12.4-76 27.7-76"></path>
                                        <path fill="none" class="stroke" d="M362.9 75l66.6 104 66-104.1c-25.5-10.9-38.9 3.6-38.9 3.6L429.5 179 401.3 78"></path>
                                        <polyline fill="none" class="stroke" points="333.3 75 429.5 179 526.3 75 "></polyline>
                                    </g>
                                    <g id="box">
                                        <rect x="356" y="47" fill="#FFF" class="stroke" width="106.2" height="86"></rect>
                                        <polygon fill="#FFF" class="stroke" points=" 462.2 47 356 47 403.2 31 500.1 31 "></polygon>
                                        <polygon fill="#FFF" class="stroke" points=" 500.1 117 462.2 133 462.2 47 500.1 31 "></polygon>
                                        <polygon opacity="0.4" fill="#05238a" points="394.1 47 394.5 81.5 408.5 70.5 422.5 81.5 422.5 47 463.3 31 431.7 31 "></polygon>
                                        <polygon fill="none" class="stroke" points=" 394.1 47 394.5 81.5 408.5 70.5 422.5 81.5 422.5 47 463.3 31 431.7 31 "></polygon>
                                    </g>
                                    <path id="tshirt" fill="#FFF" class="stroke" d="M442 717h35.7c1.7 0 3-1.5 3-3.4v-59.2c0-2.6 2.2-4.4 4.3-3.6l10.4 3.8c3.8 2.2 4.5 0.7 7.1-4.7l7.3-14.5c1.6-2.8 0.7-4.6-1.9-6.9C486 611.1 464.7 608 464.7 608c-1.5 0-2.7 1.2-3 2.9 -0.7 4.8-6.7 14.6-17.4 14.6s-16.7-9.8-17.4-14.6c-0.2-1.7-1.5-2.9-3-2.9 0 0-21.3 3-43.2 20.5 -2.6 2.4-3.5 4.1-1.9 6.9l7.3 14.5c2.7 5.4 3.3 6.8 7.1 4.7l10.4-3.8c2.1-0.8 4.3 1 4.3 3.6v59.2c0 1.9 1.3 3.4 3 3.4h35.7H442z"></path>
                                    <g id="cap">
                                        <path fill="#FFF" class="stroke" d="M495.9 829.4c-0.4 33-19.4 8.5-50 8.5 -31.4 0-50.4 24.5-50-8.5 0.3-27.9 0.6-62.5 50-62.5C495.5 766.9 496.2 801.5 495.9 829.4z"></path>
                                        <path fill="none" class="stroke" d="M396.4 824.4c0 0 18.9-8 49.5-8s49.5 8 49.5 8"></path>
                                        <ellipse fill="#05238a" cx="445.9" cy="763.4" rx="8.5" ry="3"></ellipse>
                                        <path fill="none" class="stroke" d="M406.4 819.4c0-20.7-4.8-52 39.5-52.5 44.7-0.5 39.5 31.8 39.5 52.5"></path>
                                        <line fill="none" class="stroke" x1="445.9" y1="766.4" x2="445.9" y2="816.4"></line>
                                        <circle fill="#05238a" cx="429.4" cy="777.4" r="2"></circle>
                                        <circle fill="#05238a" cx="462.4" cy="777.4" r="2"></circle>
                                    </g>
                                    <g id="ball">
                                        <circle fill="#FFF" class="stroke" cx="446" cy="803.8" r="47.3"></circle>
                                        <line fill="none" class="stroke" x1="446" y1="756.8" x2="446" y2="850.8"></line>
                                        <line fill="none" class="stroke" x1="493" y1="804.3" x2="399" y2="804.3"></line>
                                        <path fill="none" class="stroke" d="M484.2 834c-9.1-6.3-22.8-16.4-38.2-16.4s-29.1 10-38.2 16.4"></path>
                                        <path fill="none" class="stroke" d="M407.8 774.6c9.1 6.3 22.8 16.4 38.2 16.4s29.1-10 38.2-16.4"></path>
                                    </g>
                                    <g id="grass">
                                        <path fill="#05238a" d="M1226.5 857.5c4.7-20.9-7-33.3-20.4-41.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.6 2.8-5.7 3.6 -7.2 2.9-9.8 11.8-10.5 21 -3.7-12.9-11.1-24.1-11.1-24.1 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.8 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -8.1 5.9-14 13.6-17.5 22 -4-10-11.4-19-21.7-25.2 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -8.5 6.2-14.5 14.2-17.9 23 -3.9-10.4-11.4-19.8-22.1-26.2 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.8 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -8.1 5.9-14 13.6-17.5 22 -4-10-11.4-19-21.7-25.2 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -27.2 20.2-8.8 45.6-8.8 45.6"></path>
                                        <path fill="none" class="stroke round-end" d="M1226.5 857.5c4.7-20.9-7-33.3-20.4-41.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.6 2.8-5.7 3.6 -7.2 2.9-9.8 11.8-10.5 21 -3.7-12.9-11.1-24.1-11.1-24.1 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.8 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -8.1 5.9-14 13.6-17.5 22 -4-10-11.4-19-21.7-25.2 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -8.5 6.2-14.5 14.2-17.9 23 -3.9-10.4-11.4-19.8-22.1-26.2 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.8 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -8.1 5.9-14 13.6-17.5 22 -4-10-11.4-19-21.7-25.2 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -11 8-17.9 19.2-20.2 31.2 -2.6-13.7-11-26.3-24.4-34.3 -2-1.2-4-2.2-6.1-3.1 4.6 8.1 4.6 18.2-1 26.5 -1.3 1.9-2.7 3.5-4.4 5 -1.9-5.6-4.8-11.1-8.9-16 -5.7-6.9-12.9-12.1-20.9-15.4 6.6 10.9 4 24.9-6.5 33 -10.1-7.4-13.4-20.4-8.2-31.3 -7.6 4-14.3 9.8-19.3 17.2 -3.2 4.8-5.5 9.8-6.9 15 -2-1.4-3.8-3.1-5.4-5 -6.4-7.8-7.4-17.8-3.6-26.3 -2 1.1-3.9 2.3-5.7 3.6 -27.2 20.2-8.8 45.6-8.8 45.6"></path>
                                    </g>
                                    <g id="plane">
                                        <path fill="#FFF" class="stroke" d="M966.1 203.5c0 0 70.8 0.9 70.8 10.7 0 20.6-23.3 41.3-88.7 43 -34 0.9-98.5 3.6-120-1.8 -30.5-7.6-109.1-44-112-52.8 -13.4-41.2-18.8-49.3 2.7-49.3 12 0 18.6 0 26 0 14.3 0 12.5 2.7 27.8 42.1 0 0 50.2 8.1 66.3-1.8s24.6-23.3 57.6-23.4l21 0.1C938.5 171.3 949.5 176.3 966.1 203.5z"></path>
                                        <path fill="#05238a" d="M896.5 182.4v18c0 1.1-0.9 2-2 2h-39.6c-1.8 0-2.7-2.1-1.5-3.4 5.7-6 19.6-17.9 41-18.6C895.5 180.3 896.5 181.2 896.5 182.4z"></path>
                                        <path fill="#05238a" d="M906.5 182.4v18c0 1.1 0.9 2 2 2h39.6c1.8 0 2.4-1.9 1.5-3.4 -6.1-9.6-12.1-18.6-41-18.6C907.4 180.4 906.5 181.2 906.5 182.4z"></path>
                                        <path fill="none" class="stroke" d="M896.5 182.4v18c0 1.1-0.9 2-2 2h-39.6c-1.8 0-2.7-2.1-1.5-3.4 5.7-6 19.6-17.9 41-18.6C895.5 180.3 896.5 181.2 896.5 182.4z"></path>
                                        <path fill="none" class="stroke" d="M906.5 182.4v18c0 1.1 0.9 2 2 2h39.6c1.8 0 2.4-1.9 1.5-3.4 -6.1-9.6-12.1-18.6-41-18.6C907.4 180.4 906.5 181.2 906.5 182.4z"></path>
                                        <path fill="#05238a" d="M745.3 193.7h-58.2c-3.7 0-6.7-3-6.7-6.7v0c0-3.7 3-6.7 6.7-6.7h58.2c3.7 0 6.7 3 6.7 6.7v0C752 190.6 749 193.7 745.3 193.7z"></path>
                                        <g id="helix">
                                            <path fill="#05238a" d="M1037.8 233.5h-1.8c-4.2 0-3.1-12.1-3.1-12.1s-1.1-12.1 3.1-12.1l0 0c5.2 0 9.4 4.2 9.4 9.4v7.2C1045.4 230.1 1041.9 233.5 1037.8 233.5z"></path>
                                            <path fill="#05238a" d="M1037.2 214.4L1037.2 214.4c-4.6 0-8.3-34-8.3-34 0-4.6 3.8-8.3 8.3-8.3h0c4.6 0 8.3 3.8 8.3 8.3C1045.6 180.3 1041.8 214.4 1037.2 214.4z"></path>
                                            <path fill="#05238a" d="M1037.2 228.5L1037.2 228.5c4.6 0 8.3 34 8.3 34 0 4.6-3.8 8.3-8.3 8.3h0c-4.6 0-8.3-3.8-8.3-8.3C1028.9 262.5 1032.7 228.5 1037.2 228.5z"></path>
                                            <path fill="none" class="stroke" d="M1037.2 214.4L1037.2 214.4c-4.6 0-8.3-34-8.3-34 0-4.6 3.8-8.3 8.3-8.3h0c4.6 0 8.3 3.8 8.3 8.3C1045.6 180.3 1041.8 214.4 1037.2 214.4z"></path>
                                            <path fill="none" class="stroke" d="M1037.2 228.5L1037.2 228.5c4.6 0 8.3 34 8.3 34 0 4.6-3.8 8.3-8.3 8.3h0c-4.6 0-8.3-3.8-8.3-8.3C1028.9 262.5 1032.7 228.5 1037.2 228.5z"></path>
                                        </g>
                                        <use class="helix" xlink:href="#helix" filter="url(#f1)"></use>
                                        <line fill="none" class="stroke" x1="728" y1="213.3" x2="520" y2="213.2"></line>
                                        <polyline fill="none" class="stroke" points="520 182.8 558.5 214.2 520 243.7 "></polyline>
                                        <path fill="#FFF" class="stroke" d="M506.9 253.6H21.2c-6.6 0-12-5.4-12-12v-56.7c0-6.6 5.4-12 12-12h485.8c6.6 0 12 5.4 12 12v56.7C518.9 248.2 513.5 253.6 506.9 253.6z"></path>
                                        <text transform="matrix(1.0027 0 0 1 44.8218 224.8768)" font-family='Fredoka One' font-size="34" fill=""> We are building our website.
                                        </text>
                                        <path fill="#05238a" d="M850.5 216.5h79.7l-4.5 10.7c0 0-2.7 7.2-9.9 7.2h-72.6c0 0-6.3-0.9-1.8-7.2L850.5 216.5z"></path>
                                        <path fill="none" class="stroke" d="M745.3 193.7h-58.2c-3.7 0-6.7-3-6.7-6.7v0c0-3.7 3-6.7 6.7-6.7h58.2c3.7 0 6.7 3 6.7 6.7v0C752 190.6 749 193.7 745.3 193.7z"></path>
                                        <path fill="none" class="stroke" d="M850.5 216.5h79.7l-4.5 10.7c0 0-2.7 7.2-9.9 7.2h-72.6c0 0-6.3-0.9-1.8-7.2L850.5 216.5z"></path>
                                    </g>
                                </defs>

                                <g id="window">
                                    <path opacity="0.4" fill="#05238a" d="M683.6 773H368c-8.1 0-14.7-6.6-14.7-14.7V565.2c0-8.1 6.6-14.7 14.7-14.7h315.6c8.1 0 14.7 6.6 14.7 14.7v193.1C698.3 766.4 691.7 773 683.6 773z"></path>
                                    <path fill="none" class="stroke" d="M683.6 773H368c-8.1 0-14.7-6.6-14.7-14.7V565.2c0-8.1 6.6-14.7 14.7-14.7h315.6c8.1 0 14.7 6.6 14.7 14.7v193.1C698.3 766.4 691.7 773 683.6 773z"></path>
                                </g>
                                <use class="box" xlink:href="#box" x="20" y="30"></use>
                                <use class="parachute" xlink:href="#parachute" x="20" y="-112"></use>
                                <rect fill="#eff2f7" x="320" y="310" width="665" height="238"></rect>
                                <use class="tshirt" xlink:href="#tshirt"></use>
                                <use class="cap" xlink:href="#cap" y="-150"></use>
                                <use class="ball" xlink:href="#ball" y="-140"></use>
                                <use class="sky-circle" xlink:href="#sky-circle" x="-10px" y="5"></use>
                                <use class="sky-circle2" xlink:href="#sky-circle" x="500px" y="-125"></use>
                                <use class="sky-circle3" xlink:href="#sky-circle" x="1000px" y="50"></use>
                                <use class="cloud" xlink:href="#cloud2" x="0" y="10"></use>
                                <use class="plane" xlink:href="#plane" y="-80"></use>

                                <use class="cloud2" xlink:href="#cloud" x="0" y="130"></use>
                                <use class="trees" xlink:href="#tree" x="40" y="0"></use>
                                <circle class="cat-shadow" fill="#05238a" cx="1160" cy="620" r="23"></circle>
                                <use class="cat" xlink:href="#cat" x="15" y="5"></use>
                                <g id="browser">
                                    <path fill="none" class="stroke" d="M972.4 847h-640c-8.2 0-15-6.8-15-15V322.5c0-8.2 6.8-15 15-15h640c8.2 0 15 6.8 15 15V832C987.4 840.3 980.7 847 972.4 847z"></path>
                                    <circle opacity="0.4" fill="#ED4F43" cx="363.7" cy="349.3" r="12.3"></circle>
                                    <circle fill="none" class="stroke" cx="402.2" cy="349.3" r="12.3"></circle>
                                    <path fill="none" stroke="#05238a" class="stroke" d="M943.5 361.5H454.1c-5.5 0-9.9-4.5-9.9-9.9V344c0-5.5 4.5-9.9 9.9-9.9h489.4c5.5 0 9.9 4.5 9.9 9.9v7.6C953.4 357.1 949 361.5 943.5 361.5z"></path>
                                    <circle fill="none" class="stroke" cx="363.7" cy="349.3" r="12.3"></circle>
                                </g>
                                <g id="toldo">
                                    <polyline fill="#FFF" class="stroke round-end" points=" 277.6 468.6 317.7 391.8 987.6 391.8 1026.9 468.6 "></polyline>
                                    <path fill="#FFF" class="stroke" d="M392.2 391.8l-31.3 79.5c0 22.7 18.4 41 41 41 22.7 0 41-18.4 41-41"></path>
                                    <path fill="#FFF" class="stroke" d="M466.6 391.8l-22.3 79.5c0 22.7 18.4 41 41 41s41-18.4 41-41"></path>
                                    <path id="tol" fill="#FFF" class="stroke" d="M527.6 471.2c0 22.7 18.4 41 41 41 22.7 0 41-18.4 41-41"></path>
                                    <path fill="#FFF" class="stroke" d="M615.5 391.8l-4.5 79.5c0 22.7 18.4 41 41 41 22.7 0 41-18.4 41-41"></path>
                                    <path fill="#FFF" class="stroke" d="M689.9 391.8l4.4 79.5c0 22.7 18.4 41 41 41s41-18.4 41-41"></path>
                                    <path fill="#FFF" class="stroke" d="M859.7 471.2c0 22.7-18.4 41-41 41 -22.7 0-41-18.4-41-41l-13.3-79.5"></path>
                                    <use class="tol" xlink:href="#tol" x="-250"></use>
                                    <use class="tol" xlink:href="#tol" x="334"></use>
                                    <use class="tol" xlink:href="#tol" x="417"></use>
                                    <line class="stroke round-end" x1="277" y1="470.5" x2="1027" y2="470.5"></line>
                                    <line class="stroke" x1="541" y1="391.8" x2="526.5" y2="471.2"></line>
                                    <line class="stroke" x1="838.8" y1="391.8" x2="860.1" y2="471.2"></line>
                                    <path opacity="0.4" fill="#FFD700" d="M467.3 392.1h73.4l-14 79.5c0 22.7-18.4 41-41 41 -22.7 0-41-18.4-41-41L467.3 392.1z"></path>
                                    <path opacity="0.4" fill="#FFD700" d="M615.7 392.1H690l3.5 79.5c0 22.7-18.4 41-41 41 -22.7 0-41-18.4-41-41L615.7 392.1z"></path>
                                    <path opacity="0.4" fill="#FFD700" d="M765.1 392.1h73.4l21.8 79.5c0 22.7-18.4 41-41 41s-41-18.4-41-41L765.1 392.1z"></path>
                                    <path opacity="0.4" fill="#FFD700" d="M913.6 392.1h73.4l40.2 79.5c0 22.7-18.4 41-41 41 -22.7 0-41-18.4-41-41L913.6 392.1z"></path>
                                    <path opacity="0.4" fill="#FFD700" d="M317.9 392.1h73.4l-31.4 79.5c0 22.7-18.4 41-41 41 -22.7 0-41-18.4-41-41L317.9 392.1z"></path>
                                    <line fill="none" class="stroke" x1="944.4" y1="471.6" x2="913.2" y2="392.2"></line>
                                </g>
                                <g id="door">
                                    <path fill="none" class="stroke" d="M955.8 846V560.5c0-5.5-4.5-10-10-10H738.6c-5.5 0-10 4.5-10 10V846"></path>
                                    <rect fill="#05238a" x="730" y="700" width="225" height="15"></rect>
                                    <g id="sign">
                                        <polyline fill="none" class="stroke" points=" 800.8 672.8 842.5 601 883.6 672.8 "></polyline>
                                        <ellipse fill="#FFF" class="stroke" cx="842.2" cy="601" rx="10" ry="10"></ellipse>
                                        <path fill="#e22454" d="M909.3 740.7H775.1c-5.5 0-10-4.5-10-10v-47.9c0-5.5 4.5-10 10-10h134.2c5.5 0 10 4.5 10 10v47.9C919.3 736.2 914.8 740.7 909.3 740.7z"></path>
                                        <text transform="matrix(1.0027 0 0 1 789.6294 721.7501)" fill="#FFF" font-family='Fredoka One' font-size="30">CLOSED</text>
                                        <path fill="none" class="stroke" d="M909.3 740.7H775.1c-5.5 0-10-4.5-10-10v-47.9c0-5.5 4.5-10 10-10h134.2c5.5 0 10 4.5 10 10v47.9C919.3 736.2 914.8 740.7 909.3 740.7z"></path>
                                    </g>
                                </g>
                                <g id="button">
                                    <path opacity="0.4" fill="#05238a" d="M650.5 725.5H547.8c-4.7 0-8.6-3.9-8.6-8.6v-18.1c0-4.7 3.9-8.6 8.6-8.6h102.7c4.7 0 8.6 3.9 8.6 8.6v18.1C659.2 721.7 655.3 725.5 650.5 725.5z"></path>
                                    <path fill="none" class="stroke" d="M650.5 725.5H547.8c-4.7 0-8.6-3.9-8.6-8.6v-18.1c0-4.7 3.9-8.6 8.6-8.6h102.7c4.7 0 8.6 3.9 8.6 8.6v18.1C659.2 721.7 655.3 725.5 650.5 725.5z"></path>
                                </g>
                                <g id="text">
                                    <line fill="none" class="stroke round-end" x1="539.2" y1="605.5" x2="652.2" y2="605.5"></line>
                                    <line fill="none" class="stroke round-end" x1="539.2" y1="630.5" x2="669.2" y2="630.5"></line>
                                    <line fill="none" class="stroke round-end" x1="539.2" y1="655.5" x2="619.2" y2="655.5"></line>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 m-auto">
                    <div class="coming-soon-content">
                        <div>
                            <h1>We Are Coming Soon</h1>
                            <p>Would you like to get notified when the website goes live? Subscribe to
                                our mailing list and instantly get a 5% discount coupon.</p>
<?php if ($msg != "") echo $msg . "<br><br>" ?>

                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input class="form-control" placeholder="Enter your Email " name="email" type="email">
                                	<br>
                                	<input class="btn btn-primary" type="submit" name="submit" value="Notify Me!" style="margin-top: 10px; border-radius: 5px;">
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- coming soon section end -->

    <div class="bg-overlay"></div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- Notify js -->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/home-script.js"></script>

</body>

</html>