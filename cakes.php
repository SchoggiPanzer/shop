<?php
require_once 'autoloader.php';
include ("includes/common.php");
if(!isset($_SESSION['userSession'])){
    header("Location: login.php");
}
include("includes/header.php")
?>
<main id="main">
    <div id="productSite">
        <h2><?php echo $lang['TITLE_CAKE']; ?></h2>
        <div id="productImgCake">
            <img src="img/cakes/blaubeerCheescake.jpg">
        </div>
        <div id="productImgCake">
            <img src="img/cakes/cake_white_choco.jpg">
        </div>
        <div id="productImgCake">
            <img src="img/cakes/ErdbeerWeisseSchokolade.jpg">
        </div>
        <div id="productImgCake">
            <img src="img/cakes/himbeerBlaubeer.jpg">
        </div>
        <div id="productImgCake">
            <img src="img/cakes/himbeerCheescake.jpg">
        </div>
        <div id="productImgCake">
            <img src="img/cakes/strawberry_cake.jpg">
        </div>
        <div id="productImgCake">
            <img src="img/cakes/weisseSchokolade.jpg">
        </div>

    </div>
</main>
<? include("includes/footer.php");?>
