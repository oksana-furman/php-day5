<div id="nav" class="nav">
    <ul class="nav justify-content-center" id="navUl">
        <li class="nav-item">
            <a class="nav-link  text-white active" aria-current="page" href="./cars/index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white active" href="./cars/cars.php">Cars</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white active" href="./cars/jokes.html">Jokes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white disabled" href="#">Deals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white disabled" href="#">Insurance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white disabled" href="#">Locations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white disabled" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
            <?php 
        if (!isset($_SESSION['adm'])) {
            echo "";
        } else{
            echo "<a class='nav-link text-white active' href='./cars/create.php'>Add Car</a>";
        }
        ?>
        </li>
        <li class="nav-item">
        <?php 
        if (isset($_SESSION['adm'])) {
            echo "<a class='nav-link text-white active' href='./dashboard.php'>You're loged in</a>";
        } elseif(isset($_SESSION['user'])){
            echo "<a class='nav-link text-white active' href='./home.php'>You're loged in</a>";
        }else{
            echo "<a class='nav-link text-white active' href='./index.php'>Log In</a>";
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
