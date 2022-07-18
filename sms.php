<?php

 $authkeyUrl = "https://api.authkey.io/request?";
 $paramArray = Array(
     'authkey' => '7ba688615da3e864',
     'mobile' => '9996179577',
     'country_code' => '91',
     'sid' => '5093',
	 'company' => 'Twinkle',
	 'otp' => '123456'
     );
 
 $parameters = http_build_query($paramArray);
 $url = $authkeyUrl . $parameters;
 
 $curl = curl_init();
 
 curl_setopt_array($curl, array(
     CURLOPT_URL => $url,
     CURLOPT_RETURNTRANSFER => true,
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 
 curl_close($curl);
 
 if ($err) {
     echo "cURL Error #:" . $err;
 } else {
     echo $response;
 }
 
 ?>