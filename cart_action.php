<?php
require_once 'autoloader.php';
include ("includes/common.php");

$cart = $_SESSION['cart'];

if (isset($_POST["item"])) {
    $item = $_POST["item"];
    $cart->addItem($item["id"], $item["num"]);
    $_SESSION['msg'] = true;
    header('Location: '.$item['adr']);
}

if(isset($_POST["rmitem"])){
    $rmitem = $_POST["rmitem"];
    $cart->removeItem($rmitem["rmid"], $rmitem["rmnum"]);
    header('Location: '.$rmitem['adr']);
}