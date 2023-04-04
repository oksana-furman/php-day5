<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type:application/json");

require_once "../../components/db-connect.php";

$sql = "SELECT * FROM cars";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_all($result, 1);

mysqli_close($connect);

if(mysqli_num_rows($result) > 0){
    myResponse(200, "Data found", $rows);
}
else{
    myResponse(204, "No data found", NULL);
}

function myResponse($status, $status_msg, $data){
    $response = array(
        "status" => $status,
        "status_msg" => $status_msg,
        "data" => $data
    );

    $json = json_encode($response);
    echo $json;
}