<?php 

  function encrypt($value) {
    $ciphering = "AES-128-CTR";    
    $options = 0;
    $iv = '1234567891011121';      
    $key = "GeeksforGeeks"; 
    return openssl_encrypt($value, $ciphering, $key, $options, $iv);  
  }

  function decrypt($value) {
    $ciphering = "AES-128-CTR";    
    $options = 0;
    $iv = '1234567891011121';      
    $key = "GeeksforGeeks"; 
    return openssl_decrypt ($value, $ciphering, $key, $options, $iv);
  }

?>