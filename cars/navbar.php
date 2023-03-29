<?php 
session_start();
?>
<div id="nav justify-content-center">
    <ul class="nav justify-content-center" id="navUl">
        <li class="nav-item">
            <a class="nav-link  text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="cars.php">Cars</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Deals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Insurance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Locations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="./create.php">For Employees</a>
        </li>
        <li class="nav-item">

        <?php 
        if (isset($_SESSION['adm'])) {
            echo "<a class='nav-link text-white' href='../dashboard.php'>You're loged in</a>";
        } elseif(isset($_SESSION['user'])){
            echo "<a class='nav-link text-white' href='../home.php'>You're loged in</a>";
        }else{
            echo "<a class='nav-link text-white' href='../index.php'>Log In</a>";

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