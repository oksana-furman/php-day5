<?php
session_start();
require "../../components/db-connect.php";

$user_id = $_SESSION["user"];
$car_id = $_GET['id'];

$sqlStatus = "UPDATE `cars` SET `status`= 0 WHERE id = $car_id";
mysqli_query($connect, $sqlStatus);
$sql = "INSERT INTO `booking`(`fk_users_id`, `fk_cars_id`) VALUES ($user_id, $car_id)";

if(mysqli_query($connect, $sql)){
    header("Location: ../index.php");
} 





