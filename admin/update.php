<?php
require_once '../autoloader.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin_log.php");
}
$products = Product::getAllProducts();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/styles/sweetalert.css">
</head>
<body>
<div>
    <a href="index.php">Back to Index</a>
    <table>
        <tr>
            <th>Product Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Language</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php foreach ($products as $product) :
            $pid = $product->getId();
            $title = $product->getTitle();
            $description = $product->getDescription();
            $langcode = $product->getLangcode();
            $price = $product->getPrice();
            echo "<tr>
                <th><form action='update_product.php' method='post'><input id='pid' name='pid' type='hidden' value='$pid'>$pid</th>
                <th><input id='title' name='title' value='$title'></th>
                <th><textarea id='description' name='description'>$description</textarea></th>
                <th><input id='langcode' name='langcode' type='hidden' value='$langcode'>$langcode</th>
                <th><input id='price' name='price' value='$price'></th>
                <th><button type='submit' name='btn-update'>Update</button></form></th></tr>";
        endforeach ?>
    </table>
</div>
</body>
</html>