<?php

$api_key = 'rzp_live_Qxd613nk0tgXdU';
$api_secret = 'ia2CgOQ9NGJx8bKPYiD3iKw0';

$auth = base64_encode($api_key.':'.$api_secret);

$url = "https://api.razorpay.com/v1/payments/?count=100";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$auth));
$response = curl_exec($ch);

if (curl_exec($ch) === false) {
    echo "Curl error: " . curl_error($ch);
    die();
}

curl_close($ch);

$decodedResponse = json_decode($response,true);
echo "<pre>";
print_r($decodedResponse);