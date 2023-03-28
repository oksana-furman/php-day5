<?php
    session_start();
    
      if (!isset($_SESSION['user']) && !isset($_SESSION['adm'])) {
    header("Location: ../index.php");
  } elseif(isset($_SESSION['user'])){
    header("Location: ../home.php");
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
    <title>Create</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

    <div class="container">
    <div class="btnBox">
        <h1>Add New Car here!</h1>
        </div>
        <form action="./action/a_create.php" method="post" enctype="multipart/form-data" class="form-group  m-2">
            <input class="form-control m-2" type="text" name="brand" placeholder="Brand">
            <input class="form-control m-2" type="text" name="model" placeholder="Model">
            <input class="form-control m-2" type="text" name="pricePerDay" placeholder="Price per day">
            <input class="form-control m-2" type="text" name="fuelType" placeholder="Type of fuel">
            <input class="form-control m-2" type="number" name="seatNum" placeholder="Number of seats">
            <input class="form-control m-2" type="file" name="picture">
             <input type="submit" name="submit" value="Add car" class="btn btn-success m-2"> 
            </div>
        </form>

    </div>
    <?php require "./footer.php"; ?>

</body>
</html>