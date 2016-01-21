<?php
require_once '../autoloader.php';

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $langcode = $_POST['langcode'];
    $price = $_POST['price'];
    DB::doQuery("UPDATE translation SET title='$title', description='$description' WHERE pid='$pid' AND langcode='$langcode'");
    DB::doQuery("UPDATE product SET price='$price' WHERE id='$pid'");
    header("Location: update.php");
}