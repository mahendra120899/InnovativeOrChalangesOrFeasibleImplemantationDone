<?php
$url = 'http://dynupdate.no-ip.com/ip.php';
$url = 'https://www.instagragm.com/p/CNC5ShnjjPX/?igshid=e6zj7wvgckus';
$proxy = '127.0.0.1:8888';
//$proxyauth = 'user:password';

try {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
//    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    //curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $curl_scraped_page = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo $code;
//    echo $curl_scraped_page;


}catch(Exception $e){
//    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo $code;
echo $e->getCode();die;

    if ($e->getCode() === 404) {}

}
die;