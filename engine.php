<?php 

//function to encrypt email
function getEncryptedUserEmail(){
    include "config.php";
    $email =$con->real_escape_string($_POST['email']);
    //convert email to lower case
    $email_lower=strtolower($email);
    //sanitization to remove illegal characters
    $email_sanitize = filter_var($email_lower, FILTER_SANITIZE_EMAIL);
    // Validate email
    $email_validated=filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);

    $email=$email_validated; // validated and sanitized email
    $privatekey_email 	= 'NOWEINF32523EFW63HGBERV34235'; // user defined key1
    $secretkey_email		= 'hd203dh2bx2zp'; // user defined secret key1
    $encryptmethod_email      = "AES-256-CBC";
    $string_email 		=$email ; // validated user email

    $key_email = hash('sha256', $privatekey_email);
    $ivalue_email = substr(hash('sha256', $secretkey_email), 0, 16); // sha256 is hash_hmac_algo
    $result_email = openssl_encrypt($string_email, $encryptmethod_email, $key_email, 0, $ivalue_email);
    $encrypted_email= base64_encode($result_email);  // encrypted email output

    return $encrypted_email;
}


//function to generate random discount code
function getDiscountCode(){
    
    // List numbers 100000 to 999999
    $discount_gen = range(100000,999999);
    // Shuffle numbers
    shuffle($discount_gen);
    // Get a random no
    $discount_code = array_shift($discount_gen);

    $discount=$discount_code ;// get discount code
    $privatekey_discount 	= '8NOJQCIPN9-runD-HFNFIQJF'; // user defined key1
    $secretkey_discount		= '4NCaasjfj-0E2U9Edi2E'; // user defined secret key1
    $encryptmethod_discount      = "AES-256-CBC";
    $string_discount 		=$discount ; //discount code to be encrypted

    $key_discount = hash('sha256', $privatekey_discount);
    $ivalue_discount = substr(hash('sha256', $secretkey_discount), 0, 16); // sha256 is hash_hmac_algo
    $result_discount = openssl_encrypt($string_discount, $encryptmethod_discount, $key_discount, 0, $ivalue_discount);
    $encrypted_discount_code= base64_encode($result_discount);  // output encrypted discount code

    return $encrypted_discount_code;

}

//function to get user / visitor ip address
function getEncryptedUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    

    $ip_address=$ip ;//get ip value
    $privatekey_ip	= '8NOJQCIPN9-runD-HFNFIQJF'; // user defined key
    $secretkey_ip		= '4NCaasjfj-0E2U9Edi2E'; // user defined secret key
    $encryptMethod_ip      = "AES-256-CBC";

    $string_ip 		=$ip_address ; // ip address value

    $key_ip = hash('sha256', $privatekey_ip);
    $ivalue_ip = substr(hash('sha256', $secretkey_ip), 0, 16); // sha256 is hash_hmac_algo
    $result_ip = openssl_encrypt($string_ip, $encryptMethod_ip, $key_ip, 0, $ivalue_ip);
    $encrypted_ip= base64_encode($result_ip);  // output encrypted ip

    return $encrypted_ip;

}