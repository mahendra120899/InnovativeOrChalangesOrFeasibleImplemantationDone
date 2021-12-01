<?php

//echo 121;die;
//------Bulk SMS Send message Request
//function curl($url,$params = '',$headers = ''){
//
//    $ch = curl_init();
//
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//    if($params != ''){
//        curl_setopt($ch, CURLOPT_POST,true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
//    }
//
//    if($headers != ''){
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//    }
//
//    $result = curl_exec($ch);
//
//    curl_close($ch);
//
//    return trim($result);
//
//}

//
//
//echo "<pre>";
//$url = 'http://hp.bulksms1.com/sms/user/urlsms.php?username=m.santosh&pass=Msantosh12!@&senderid=QDEALS&message=Hellohowareyou!&dest_mobileno=919575845324,919179111502&response=Y';
//$resp = curl($url);
//print_r($resp);
//die();


//$link = "https://www.instagram.com/__kesho/";
$link = "https://www.instagram.com/monniz__/";
$proxy = "131.196.53.126:29842";
$proxyauth = 'psaluj:xGWgn4ky';

$ch = curl_init();
curl_setopt ($ch, CURLOPT_HTTPGET,        TRUE);
curl_setopt ($ch, CURLOPT_POST,           FALSE);
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-requested-with: XMLHttpRequest',
    'accept-language: en-US,en;q=0.8,pt;q=0.6,hi;q=0.4',
    'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
    'Accept: */*',
    'Connection: keep-alive',
    'authority: www.instagram.com'
));
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);


//curl_setopt ($ch, CURLOPT_COOKIEJAR,      "cookie.txt");   // Defined Constant
//curl_setopt ($ch, CURLOPT_COOKIEFILE,     "cookie.txt");
curl_setopt ($ch, CURLOPT_REFERER,        '');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_MAXREDIRS,      4);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);


// curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
// curl_setopt($ch, CURLOPT_PROXY, '185.251.33.194:39613');
$res = curl_exec($ch);

//if (defined("MC_DEBUG")) mc_log("<bridge.php err = ".curl_errno($ch)." proxy = $proxy\n".print_r($cekilendatalar,true)."\nerror:\n".curl_error($ch));
//if (defined("MC_DEBUG")) mc_log("<bridge.php err = ".curl_errno($ch)." \nres=".$res."\nerror:\n".curl_error($ch));

if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}else{
    echo 'Operation completed without any errors';
}

curl_close($ch);
print_r($res);
die;




//------Get Instagram User Dhasboard Data

$insta_source = @file_get_contents('https://www.instagram.com/__kesho/');
if ($insta_source === FALSE) {

    throw new Exception("Uh oh! We couldn't find the username that you were looking for. Please try again!");

}
$shards = explode('window._sharedData = ', $insta_source);
$insta_json = explode(';</script>', $shards[1]);
$insta_array = json_decode($insta_json[0], TRUE);
echo "<pre>";
print_r($insta_array);
die();
$hh="[0]['node']['thumbnail_resources'][0]['src']";
//print_r($insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges']);
$in1 = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];

for($l1=0; $l1<= count($in1)-1; $l1++){
//    print_r($in1[$l1]['node']['thumbnail_resources']);
    $in2 =$in1[$l1]['node']['thumbnail_resources'];

    for($l2=0; $l2<= count($in2)-1; $l2++){
//        echo "<pre>";
//            print_r($in2[$l2]['src']);
//die();

        $url = 'C:/Users/Dell/Desktop/insta_image/b'.$l1.'_'.$l2.'.jpg';
//        $img = 'https://instagram.fnag3-1.fna.fbcdn.net/vp/d3cd8cdc575490a90294ed97d1ccd580/5DA8E6AA/t51.2885-15/e35/c5.0.590.590a/66053200_113228109976521_8149208764296618922_n.jpg?_nc_ht=instagram.fnag3-1.fna.fbcdn.net';
        file_put_contents($url, file_get_contents($in2[$l2]['src']));

    }

}

die();


include_once('simple_html_dom.php');

$url = 'C:/Users/Dell/Desktop/insta_image/b.jpg';
$img = 'https://instagram.fnag3-1.fna.fbcdn.net/vp/d3cd8cdc575490a90294ed97d1ccd580/5DA8E6AA/t51.2885-15/e35/c5.0.590.590a/66053200_113228109976521_8149208764296618922_n.jpg?_nc_ht=instagram.fnag3-1.fna.fbcdn.net';
file_put_contents($url, file_get_contents($img));

//$html = new simple_html_dom();
// Create DOM from URL or file
//$html = file_get_html('https://www.instagram.com/__kesho/');
$html = @file_get_contents('https://www.instagram.com/__kesho/');
echo $html;
// Find all images
//foreach($html->find('img') as $element)
//    echo $element->src . '<br>';

//// Find all links
//foreach($html->find('a') as $element)
//    echo $element->href . '<br>';

