<?php
    session_start();
    require "./components/db-connect.php";

    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    } 
    
    if (isset($_SESSION['user'])) {
        header("Location: home.php");
        exit;
    } 

    $class = 'd-none';
    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $email = $data['email'];
            $date_of_birth = $data['date_of_birth'];
            $picture = $data['picture'];
        }
    }

    if ($_POST) {
        $id = $_POST['id'];
        $picture = $_POST['picture'];
        ($picture == "avatar.png") ?: unlink("pictures/$picture");
      
        $sql = "DELETE FROM users WHERE id = {$id}";
        if ($connect->query($sql) === TRUE) {
            $class = "alert alert-success";
            $message = "Successfully Deleted!";
            header("refresh:3;url=dashboard.php");
        } else {
            $class = "alert alert-danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
      }
      
      mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php"; ?>
    <?php linkFun(0);  ?>
    <title>Delete User</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

    <div class="<?= $class; ?>" role="alert">
        <p class="text-white"><?= ($message) ?? ''; ?></p>
    </div>
    <fieldset>
        <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='pictures/<?= $picture ?>' alt="<?= $first_name ?>"></legend>
        <h5>You have selected the data below:</h5>
        <table class="table w-75 mt-3 text-white">
            <tr>
                <td><?= "$first_name $last_name" ?></td>
                <td><?= $email ?></td>
                <td><?= $date_of_birth ?></td>
            </tr>
        </table>

        <h3 class="mb-4">Do you really want to delete this user?</h3>
        <form method="post">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="picture" value="<?= $picture ?>" />
            <button class="btn btn-danger" type="submit">Yes, delete it!</button>
            <a href="dashboard.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
        </form>
    </fieldset>
   
    <?php require "./cars/footer.php"; ?>
</body>
</html>
