<?php

$ip = "171.51.152.30";
$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
echo "<pre>";

$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success')
{
    echo 'Your City is ' . $query['city'];
    echo '<br />';
    echo 'Your State is ' . $query['region'];
    echo '<br />';
    echo 'Your Zipcode is ' . $query['zip'];
    echo '<br />';
    echo 'Your Coordinates are ' . $query['lat'] . ', ' . $query['lon'];

    print_r($dataArray);
    print_r($query);
    die();
}else{
    print_r($query);
    die();
}



function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

?>


<!--    // Example 1: Get visitor IP address details-->
<?php
//
//echo $country = ip_info("Visitor", "Country"); // India
//echo $countryCode = ip_info("Visitor", "Country Code"); // IN
//echo $state = ip_info("Visitor", "State"); // Andhra Pradesh
//echo $city = ip_info("Visitor", "City"); // Proddatur
//echo $address = ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India
//
//print_r(ip_info("Visitor", "Location")); // Array ( [city] => Proddatur [state] => Andhra Pradesh [country] => India [country_code] => IN [continent] => Asia [continent_code] => AS )
//
//?>


<!--    // Example 2: Get details of any IP address. [Support IPV4 & IPV6]-->
<?php

//echo $country = ip_info("173.252.110.27", "Country"); // United States
//echo $countryCode = ip_info("173.252.110.27", "Country Code"); // US
//echo $state = ip_info("173.252.110.27", "State"); // California
//echo $city = ip_info("173.252.110.27", "City"); // Menlo Park
//echo $address = ip_info("173.252.110.27", "Address"); // Menlo Park, California, United States

print_r(ip_info("173.252.110.27", "Location", true)); // Array ( [city] => Menlo Park [state] => California [country] => United States [country_code] => US [continent] => North America [continent_code] => NA )
//print_r(ip_info("192.168.29.132", "Location")); // Array ( [city] => Menlo Park [state] => California [country] => United States [country_code] => US [continent] => North America [continent_code] => NA )

?>