<?php
require_once("PaytmChecksum.php");
//$order_id = "22008070613150011";
//$order_id = "202008062038010059";
//$order_id = "2020081111164800072";
//$order_id = "20200818132757600056460150439689";
//$order_id = "202008181327576000564";
//$order_id = "202008181057580020";
$order_id = "P2008211209327129823923";
//live
$merchant_id = "WouQds27439742446791";
$merchant_key = "B&5w1DTScmnWnMkS";

$paytmParams = array();

$paytmParams["MID"]     = $merchant_id;
$paytmParams["ORDERID"] = $order_id;

try {

    $checksum = PaytmChecksum::generateSignature($paytmParams, $merchant_key);
    $verifySignature = PaytmChecksum::verifySignature($paytmParams, $merchant_key, $checksum);

}catch(Exception $e){
    echo $e->getMessage();
    die();
}

if($verifySignature) {

    $paytmParams["CHECKSUMHASH"] = $checksum;

    $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

    /* for Staging */
//        $url = "https://securegw-stage.paytm.in/order/status";

    /* for Production */
    $url = "https://securegw.paytm.in/order/status";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
//            print_r($response);

    if (curl_exec($ch) === false) {

        echo "Curl error: " . curl_error($ch);
        die();

    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);

    echo "<pre>";
    print_r($decodedResponse);

}