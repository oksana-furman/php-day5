<?php
$key = "pQjNZ5bIQ1tbrQWTueXbTxj2hoYIxnTg";
$city = 31868;
$urlWeather = "http://dataservice.accuweather.com/currentconditions/v1/$city?apikey=$key&details=true";
$url = "http://api.serri.codefactory.live/random/";
$url2 = "";

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
curl_close($client);
echo $response;

$client1 = curl_init($urlurlWeather);
curl_setopt($client1, CURLOPT_RETURNTRANSFER, true);
$response1 = curl_exec($client1);
curl_close($client1);
echo $response1;

$client2 = curl_init($url2);
curl_setopt($client2, CURLOPT_RETURNTRANSFER, true);
$response2 = curl_exec($client2);
curl_close($client2);
echo $response2;