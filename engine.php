<?php 


//function to generate random discount code
function getDiscountCode(){
    
    // List numbers 100000 to 999999
    $discount_gen = range(100000,999999);
    // Shuffle numbers
    shuffle($discount_gen);
    // Get a random no
    $discount_code = array_shift($discount_gen);

    return $discount_code;

}

