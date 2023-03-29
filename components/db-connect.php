<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $connect = new mysqli($hostname, $username, $password, $dbname);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } 

    // define("DB_HOSTNAME", "localhost");
    // define("DB_USERNAME", "root");
    // define("DB_PASSWORD", "");
    // define("DB_DATABASE", "login");

    // $connect = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



    