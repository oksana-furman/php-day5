<?php
function linkFun($param){
    if($param == 1){
        echo "<link rel='stylesheet' href='../components/style.css'>";
    } elseif($param == 2){
        echo "<link rel='stylesheet' href='../../components/style.css'>";
    } else {
        echo "<link rel='stylesheet' href='./components/style.css'>";
    }
}

echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp' crossorigin='anonymous'>";
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css'>";


echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js' integrity='sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N' crossorigin='anonymous'></script>";