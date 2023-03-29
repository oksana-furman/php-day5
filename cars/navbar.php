<?php 
session_start();
?>
<div id="nav">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cars.php">Cars</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Deals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Insurance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Locations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./create.php">For Employees</a>
        </li>
        <li class="nav-item">

        <?php 
        if (isset($_SESSION['adm'])) {
            echo "<a class='nav-link' href='../dashboard.php'>You're loged in</a>";
        } elseif(isset($_SESSION['user'])){
            echo "<a class='nav-link' href='../home.php'>You're loged in</a>";
        }else{
            echo "<a class='nav-link' href='../index.php'>Log In</a>";

        }
        ?>
        </li>
    </ul>
</div>
<!-- hero section -->
<div class="box">
        <div class="innerBox">
            <h1>Best Car Rental Company</h1>
        </div>
    </div>