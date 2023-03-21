<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="assets/images/favicon/2.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png">
    <meta name="theme-color" content="#e22454">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Finko Supplies">
    <meta name="msapplication-TileImage" content="assets/images/favicon/2.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Finko Supplies Agencies is an online shopping platform in Kenya, selling a wide array of products ranging from home appliances, office equipment, electronics and so much more.">
    <meta name="keywords" content="Finko Supplies Agencies,online,shop, tv, decor, kitchenware, smartphone, mobile, console, furniture">
    <meta name="author" content="Eazzzy Digital">
    <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Verification Success</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../../css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">

</head>

<body class="theme-color2 light ltr">

    <!-- header start -->
    <header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="https://finkosuppliesagencies.com">
                                       
                                        <img src="assets/images/logo/finko-logo.png" class="img-fluid blur-up lazyload" alt="finko-logo">
                                    </a>
                                </div>
                               
                            </div>
                           
                            <div class="menu-right">
                                <ul>
                                   
                                    <li >
                                       <button type="button" class="btn btn-solid-default btn-spacing" style="border-radius: 5px;" onclick="window.location.href='https://finkosuppliesagencies.com/login.php';">
                                            <i data-feather="key" class="pe-2"></i>
                                           <span>LOG IN</span></a>
                                        </button>
                                       
                                    </li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->



    <!-- Order Success Section Start -->
    <section class="pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="success-icon">
                        <div class="main-container">
                            <div class="check-container">
                                <div class="check-background">
                                    <svg viewbox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="check-shadow"></div>
                            </div>
                        </div>

                        <div class="success-contain">
                            <h4>Verification Successful </h4>
                            <h5 class="font-light">Your <?php 
                            
                            include "playground/config.php";
                            		//decrypt code for output1
$output1=$link->real_escape_string($_GET['e']); //test encoded output1
$privateKey 	= 'NOWEINF32523EFW63HGBERV34235'; // user define key
$secretKey 		= 'hd203dh2bx2zp'; // user define secret key
$encryptMethod      = "AES-256-CBC";
$stringEncrypt      = $output1; // user encrypt value

$key    = hash('sha256', $privateKey);
$ivalue = substr(hash('sha256', $secretKey), 0, 16); // sha256 is hash_hmac_algo

 $output_decoded = openssl_decrypt(base64_decode($stringEncrypt), $encryptMethod, $key, 0, $ivalue);
                            
                            
                            echo"$output_decoded";?> Has Been Verified Succssfully.</h5>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Success Section End -->



    <!-- footer start -->
    <?php require_once "footer.php"?>
    
    <!-- footer end -->


    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>