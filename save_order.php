<?php
require_once 'autoloader.php';

if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $nr = $_POST['nr'];
    $zip = $_POST['zip'];
    $city = $_POST['city'];
    $ordertext = $_POST['ordertext'];
    DB::doQuery("INSERT INTO cakeorder (fname, lastname, email, street, houseNr, zip, city, cakeorder) VALUES ('$fname', '$lname', '$email', '$street', '$nr', '$zip', '$city', '$ordertext')");

}


