<?php
$key = "pQjNZ5bIQ1tbrQWTueXbTxj2hoYIxnTg";
$city = 31868;
//$urlWeather = "http://dataservice.accuweather.com/currentconditions/v1/$city?apikey=$key&details=true";
$url = "";

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
curl_close($client);
echo $response;