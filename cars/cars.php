<?php
    require "../components/db-connect.php";

    $sql = "select * from cars";
    $result = mysqli_query($connect, $sql);
    $body = "";
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) { // mysqli_fetch_assoc fetches 1 row  with while it will fetch every row
           $body .= "
           <div class='card' style='width: 18rem;'>
           <img src='./img/{$row['picture']}' class='card-img-top' alt='{$row['brand']}'>
           <div class='card-body'>
               <h5 class='card-title'>{$row['brand']} {$row['model']}</h5>
               <p class='card-text'>{$row['pricePerDay']}  &#8364;</p>
               <a class='btn btn-primary' href='./details.php?id={$row['id']}'>See more</a>
           </div>
       </div>";
        }
    } else {
        $body .= "
        <div>
        <p>No results</p>
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
    <title>Document</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

    <div class="container">
    <h2 class="text-center m-3 p-3 mt-5">Our cars</h2>
    <div class="row row-cols-3">
            <?= $body ?>
    </div>
    </div>
    
    <?php require "./footer.php"; ?>
</body>
</html>