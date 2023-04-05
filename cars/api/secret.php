<?php
$key = "pQjNZ5bIQ1tbrQWTueXbTxj2hoYIxnTg";
$city = 31868;
$url = "http://api.serri.codefactory.live/random/";

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
curl_close($client);
echo $response;

