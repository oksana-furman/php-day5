<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Content-Type:application/json");

    if(isset($_GET["id"])){
        if(!empty($_GET["id"])){
            $id = $_GET["id"];
            require_once "../components/db-connect.php";

            $sql = "SELECT * FROM cars WHERE id = $id";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);
            $brand = @$row["brand"]? : null;
            $model = @$row["model"]? : null;
            $pricePerDay = @$row["pricePerDay"]? : null;
            mysqli_close($connect);

            if(empty($name) && empty($pricePerDay)){
                myResponse(204, "car not found", NULL, NULL);
            }
            else{
                myResponse(200, "car found", $brand, $model, $pricePerDay);
            }
        }
        else{
            myResponse(400, "bad request", NULL, NULL);
        }
    }
    else{
        header("Location: index.html");
    }

    function myResponse($status, $status_msg, $brand, $model, $pricePerDay){
        $response = array(
            "status" => $status,
            "status_msg" => $status_msg,
            "brand" => $brand,
            "model" => $model,
            "pricePerDay" => $pricePerDay
        );
    
        $json = json_encode($response);
        echo $json;
    }