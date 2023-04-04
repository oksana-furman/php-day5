<?php
    require "../components/db-connect.php";
    session_start();

    $sqlBooking = "select users.*, booking.* from users join booking on users.id = booking.fk_users_id;";
    $resultUser = mysqli_query($connect, $sqlBooking);
    $row2 = mysqli_fetch_assoc($resultUser);


    $sql = "select * from cars where id = {$_GET['id']}";
    $body = "";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);


    if(!isset($_SESSION['adm']) && !isset($_SESSION['user'])){
       $body .= "
        <div class='card cardBody m-4'>
            <img src='./img/{$row['picture']}' class='card-img-top' alt='{$row['brand']}'>
            <div class='card-body'>
                <h5 class='card-title'>{$row['brand']} {$row['model']}</h5>
                <p class='card-text'>{$row['pricePerDay']}  &#8364; per day</p>
                <p class='card-text'><i class='bi bi-fuel-pump'></i> {$row['fuelType']}</p>
                <p class='card-text'><i class='bi bi-person'></i> {$row['seatNum']} seats</p>
            </div>
        </div>"; 
    } elseif(isset($_SESSION['user'])){
        $body .= "
        <div class='card cardBody m-4'>
            <img src='./img/{$row['picture']}' class='card-img-top' alt='{$row['brand']}'>
            <div class='card-body'>
                <h5 class='card-title'>{$row['brand']} {$row['model']}</h5>
                <p class='card-text'>{$row['pricePerDay']}  &#8364; per day</p>
                <p class='card-text'><i class='bi bi-fuel-pump'></i> {$row['fuelType']}</p>
                <p class='card-text'><i class='bi bi-person'></i> {$row['seatNum']} seats</p>
                <div class='btnBox'>
                <a href='./action/booking.php?id={$row['id']}' class='btn btn-success'>Book this car</a>
            </div>
            </div>
        </div>"; 
    }else {
        $body .= "
        <div class='card cardBody m-4'>
            <img src='./img/{$row['picture']}' class='card-img-top' alt='{$row['brand']}'>
            <div class='card-body text-center'>
                <h5 class='card-title'>{$row['brand']} {$row['model']}</h5>
                <p class='card-text'>{$row['pricePerDay']}  &#8364; per day</p>
                <p class='card-text'><i class='bi bi-fuel-pump'></i> {$row['fuelType']}</p>
                <p class='card-text'><i class='bi bi-person'></i> {$row['seatNum']} seats</p>
            </div>
            <div class='btnBox'>
                <a href='./booking.php?id={$row['id']}' class='btn btn-secondary'>Book this car</a>
                
                <a href='./update.php?id={$row['id']}' class='btn btn-warning'>Update</a>
                <a href='./delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
            </div>
        </div>"; 
    }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/boot.php"; ?>
    <?php linkFun(1);  ?>
    <title>Details</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

   <div class="container">
    <div class="avail text-center">
            <?php 
                if ($row['status'] == 0) {
                    echo "<h2 class='text-danger'>Booked</h2>
                    <h4 class='text-danger'>User info: \"ID{$row2['id']}\" {$row2['email']} {$row2['first_name']} {$row2['last_name']}</h4>";
                } else {
                    echo "<h2 class='text-success'>Free for booking</h2>";
                }
            ?>      
    </div>
        <div  class="ms-5">
            <?= $body; ?>
        </div>
        <div class="text-center">
            <h3 class="h">Great choice!</h3>
            <div class="row row-cols-2">
                <p class="par"><i class="bi bi-check-lg"></i> Customer rating: 7,7 / 10</p>
                <p class="par"><i class="bi bi-check-lg"></i> Most popular fuel policy</p>
                <p class="par"><i class="bi bi-check-lg"></i> Short queues</p>
                <p class="par"><i class="bi bi-check-lg"></i> Easy to find counter</p>
                <p class="par"><i class="bi bi-check-lg"></i> Helpful counter staff</p>
                <p class="par"><i class="bi bi-check-lg"></i> Free Cancellation</p>
            </div>
            <hr>
            <h3 class="h">Included in the price</h3>
            <div class="row row-cols-2">
                <p class="par"><i class="bi bi-check-lg"></i> Free cancellation up to 48 hours before pick-up</p>
                <p class="par"><i class="bi bi-check-lg"></i> Collision Damage Waiver with €2,100 excess</p>
                <p class="par"><i class="bi bi-check-lg"></i> Theft Protection with €2,100 excess</p>
                <p class="par"><i class="bi bi-check-lg"></i> Unlimited mileage</p>   
            </div>
            <hr>
            <h3 class="h">Extras</h3>
            <div class="row row-cols-2">
                <p class="par"><i class="bi bi-check-lg"></i> Child seats, additional drivers and more.</p>
            </div>
        </div>
   </div>

   <?php require "./footer.php"; ?>
</body>
</html>