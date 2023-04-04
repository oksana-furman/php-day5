<?php
    session_start();
    require "../components/db-connect.php";
    require "../components/file-upload.php";

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM cars WHERE id = $id ";
        $result = mysqli_query($connect, $sqlSelect);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $brand = $row['brand'];
            $model = $row['model'];
            $pricePerDay = $row['pricePerDay'];
            $fuelType = $row['fuelType'];
            $seatNum = $row['seatNum'];
            $picture = $row['picture'];
        } else {
            header("location: error.php");
        }
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
    <title>Delete</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

    <fieldset>
        <legend class="h2 mb-3">
            Delete request <img class="img-thumbnail rounded-circle" src="./img/<?= $picture ?>" alt="<?php echo $brand . " " . $model; ?>">
        </legend>
        <h5>You have selected the data below:</h5>
        <table class="table w-75 mt-3 text-white">
            <tr>
                <td><?= $brand . " " . $model ?></td>
            </tr>
        </table>

        <h3 class="mb-4">Do you really want to delete this product?</h3>
        <form action="./action/a_delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="picture" value="<?= $picture ?>">
            <button class="btn btn-danger" type="submit" name="submit">Yes, delete it!</button>
            <a href="./cars.php" type="button" class="btn btn-warning">No, go back!</a>

        </form>

    </fieldset>

        <?php require "./footer.php"; ?>
</body>
</html>