<?php
include("includes/common.php");
require_once 'autoloader.php';

if(!isset($_SESSION['userSession'])){
    header("Location: login.php");
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = new Cart();
}
$cart = $_SESSION["cart"];

include("includes/header.php");
$cupcakes = Product::getNormalProducts($_GET['lang'])
?>

<main id="main">
    <?php if(isset($_SESSION['msg'])) {
        echo "<script type='text/javascript'>swal({title: \"Thanks!\", text: \"Added to cart\", type: \"success\", timer: 1000, showConfirmButton: false });</script>";
        unset($_SESSION['msg']);
    }
    foreach ($cupcakes as $cupcake) : ?>
        <div id="productSite" class="container-fluid">
            <div id="productImg" class="container-fluid"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($cupcake->getImage()) . '"/>'; ?></div>
            <div id="ProductDetails" class="container-fluid">
                <p><?php echo $cupcake->getTitle(); ?></p>
                <p><?php echo $cupcake->getDescription(); ?></p>
                <p><label>Price: </label> CHF <?php echo $cupcake->getPrice(); ?>.-</p>
                <form action="cart_action.php" method="post">
                    <input type="hidden" name="item[id]" value="<?php echo $cupcake->getId() ?>"/>
                    <input type="hidden" name="item[adr]" value="cupcakes.php<?php echo $lang['LINK_LANG']; ?>"/>
                    <label> Anzahl:
                        <select name="item[num]">
                            <option>6</option>
                            <option>12</option>
                            <option>18</option>
                            <option>24</option>
                        </select>
                    </label>
                    <input type="submit" class="btn btn-info btn-xs" value="<?php echo $lang['ADD_CART']?>">
                </form>
            </div>

        </div>
    <?php endforeach; ?>
</main>
<? include("includes/footer.php"); ?>
