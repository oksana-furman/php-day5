<?php
    require "../../components/db-connect.php";
    require "../../components/file-upload.php";


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $pricePerDay = $_POST['pricePerDay'];
        $fuelType = $_POST['fuelType'];
        $seatNum = $_POST['seatNum'];
        $uploadError = '';

        $picture = file_upload($_FILES['picture'], "cars");

    if ($picture->error == 0) { # you choose a file
            $sqlUpdate = "UPDATE `cars` SET `brand`='$brand',`model`='$model',`picture`='$picture->fileName',`fuelType`='$fuelType',`seatNum`='$seatNum',`pricePerDay`='$pricePerDay' WHERE id = $id";
        if ($_POST['picture'] != "car1.jpg" ) {
            unlink("../img/{$_POST["picture"]}");
            
            
        }
    }else { // you didn't change the image
        $sqlUpdate = "UPDATE `cars` SET `brand`='$brand',`model`='$model',`fuelType`='$fuelType',`seatNum`='$seatNum',`pricePerDay`='$pricePerDay' WHERE id = $id";
    }
    if(mysqli_query($connect, $sqlUpdate) === true){
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        # header("Location: ../index.php");
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect); 
    } else {
        header("location: ../error.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once "../../components/boot.php"; ?>
        <?php linkFun(1);  ?> 
    </head>
    <body>
    <?php require "../navbar.php"; ?>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>

        <?php require "../footer.php"; ?>
    </body>
</html>