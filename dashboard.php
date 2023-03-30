<?php
    session_start();

    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
    } elseif (isset($_SESSION['user'])) {
        header("Location: home.php");
    } 
    require "./components/db-connect.php";

    $id = $_SESSION['adm'];
    $status = 'adm';
    $sql = "SELECT * FROM users WHERE status != '$status'";
    $result = mysqli_query($connect, $sql);

    $sql2 = "SELECT * FROM users WHERE id = {$_SESSION['adm']}";
    $result2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $tbody = '';
    if (mysqli_num_rows($result) > 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tbody .= "
        <tr>
          <td><img class='img-thumbnail rounded-circle' src='./pictures/{$row['picture']}' alt='{$row['first_name']}'></td>
          <td>{$row['first_name']} {$row['last_name']}</td>
          <td>{$row['date_of_birth']}</td>
          <td>{$row['email']}</td>
          <td><a href='update_profile.php?id={$row['id']}'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
          <a href='delete_profile.php?id={$row['id']}'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
       </tr>";  
        } 
    } else{
        $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
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
    <title>Welcome <?= $row2['first_name'] ?></title>
</head>
<body>
    <?php require "./navbar.php"; ?>
    <div class="container">
        <div class="hero m-2">
            <p class="text-white">Administrator</p>
            <img class="userImage m-2" src="pictures/<?= $row2['picture']; ?>" alt="<?= $row2['first_name']; ?>">
            <p class="text-white">Hi <?= $row2['first_name']; ?></p>
            <div class="btnBox">
                 <a class="link m-2" href="logout.php?logout">Sign Out</a>
        <a class="link m-2" href="update_profile.php?id=<?= $_SESSION['adm'] ?>">Update your profile</a>
            </div>

            <div class="col-8 offset-2 mt-3 mb-3">
              <p class='h2'>Users</p>
              <table class='table'>
                  <thead class='table-success'>
                      <tr>
                          <th>Picture</th>
                          <th>Name</th>
                          <th>Date of birth</th>
                          <th>Email</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody class="text-white">
                      <?= $tbody ?>
                  </tbody>
              </table>
          </div>
        </div>
       

    </div>

    <?php require "./cars/footer.php"; ?>
</body>
</html>
