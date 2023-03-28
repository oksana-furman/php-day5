<?php 
  session_start();

  require "../components/db-connect.php";


$sql = "select * from cars";
$result = mysqli_query($connect, $sql);
$body = "";

if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) { // mysqli_fetch_assoc fetches 1 row  with while it will fetch every row
       // var_dump($row);
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
    <title>Car rental company</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

    <!-- hero section -->
    <!-- <div class="box">
        <div class="innerBox">
            <h1>Best Car Rental Company</h1>
        </div>
    </div> -->
<!-- main section -->
<div class="container">

    <h1 class="text-center m-5 p-5">Vienna Rental - your best experience</h1>
    <p>Sitting pretty on the banks of the famed River Danube, Austria's capital is a city where it seems like every street, corner and square is lifted straight from a postcard. The monuments, palaces, halls, cathedrals, cafes, museums and parks are all
        fittingly elegant for a city that's had a central role in world history and culture.<br> <br> Music is especially cherished here, with 15th century choirs and a wonderful orchestra. Vienna was not only the birthplace of Schubert, but was home
        to the likes of Mozart, Beethoven, Mahler and Haydn when they were composing symphonies. That rich musical heritage lives on here.<br> <br> Take advantage of our pick-up locations, including at the airport, so that you can arrive and venture forth
        into Vienna and Austria. With no hidden extras or credit card fees, plus a diverse range of car collections to give you plenty of choice, we'll do everything we can to make your visit to Vienna a memorable one.</p>
    <h2 class="text-center m-3 p-3 mt-5">Our most popular cars</h2>
    <div class="row row-cols-3">
            <?= $body ?>
    </div>
    
    <div class="carsBtn">
        <a href="cars.php" class="btn btn-danger">See all cars</a>
    </div>
    <div class="text-center">
        <h2>A Quick Guide To Vienna</h2>
        <p>Whether you've come here to retrace the footsteps of Mozart, or to saunter through the streets in search of sachertorte, Vienna is a relaxed city that you can discover at your own pace.</p>
        <h4>Pleasures of Prater </h4>
        <p>An iconic park in the Leopoldstadt district, Prater combines a public park, a narrow-gauge railway called the Liliputbahn, restaurants, a planetarium and, most legendary of all, the Wiener Riesenrad. This ferris wheel was built in 1897 (and rebuilt
            in 1945 after burning down) and is the one where Orson Welles delivered his famous 'cuckoo clock' speech in classic movie The Third Man. You can board it for around 10 euros, or splurge on a candlelit dinner in one of the carriages.</p>

        <h4>Markets and Mozart</h4>
        <p>Staying outdoors, the city's Naschmarkt is a colorful and sprawling market that has been running since the 16th century. Covering 1.5km, it encompasses stalls selling bread and pastries, vegetables and fruit, and a weekend flea market. It's the
            perfect way to sample local produce, as well as food from around the world - with vendors offering great Japanese, Vietnamese and Turkish delicacies.<br> Mozart lived at the apartment that is now part of Mozarthaus Vienna when he was writing
            The Marriage of Figaro, spending some 10 years in the city. You'll hear his music all over town, but this is the place to explore his life and legacy. For an immersive musical vacation, you're spoiled for choice, with a Schubert Museum, Beethoven
            House and Haus der Musik Museum all diverting attractions.</p>
        <h4>Home of the Habsburgs </h4>
        <p>The long Habsburg Dynasty shaped much of Vienna - culturally, socially and architecturally. You can spend weeks here just tracing their influence, whether it's at the summer palace of Schloss Schonbrunn, built in the 17th century, or the baroque
            wonder of Schloss Belvedere. They gathered art from far and wide, and the Kunsthistoriches Museum is home to much of it. It specializes in Renaissance art, but also finds time and space for Roman and Egyptian curiosities. Sitting on Ringstrasse,
            you'll find a brilliant Velazquez collection, plus pieces from Gainsborough, Durer, Hans Holbein, Rembrandt, Rubens, van Dyck, Raphael, Bruegel and Caravaggio.<br> Move on from there to Hofburg, where the Habsburgs lived for over six centuries
            until 1918. You can tour the lavish imperial apartments for another glimpse into Viennese history, before heading to St. Stephen's Cathedral with its astonishing roof, crypt and tombs - the site of many Habsburg marriages, and the place where
            Vivaldi's funeral was held.</p>
        <h4>A piece of cake</h4>
        <p>You can't leave Vienna without sampling some café culture, whether that's with a piece of the city's famous sachertorte or perhaps some apple strudel. You can try these classics at the 19th century Café Central, as well as some more recent creations
            from their head patissiere. Seek out Demel Vienna too - they've been going for 230 years and used to supply cakes to the Imperial court. Their Demel cake is legendary, as are the Esterhazy and their candied violets.<br> This city is the stuff
            of legend, and a visit here and along the Danube will be one you'll always treasure. Make the experience even better with car rental in Vienna so that you can explore the lakes, meadows and mountains of this fascinating country. </p>
    </div>
</div>

<?php require "./footer.php"; ?>
</body>
</html>