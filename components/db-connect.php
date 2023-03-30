<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    #to deploy from filezilla
    // $hostname = "173.212.235.205";
    // $username = "oksanacodefactor_oksana";
    // $password = "One23one23";
    // $dbname = "oksanacodefactor_login";


    $connect = new mysqli($hostname, $username, $password, $dbname);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } 
