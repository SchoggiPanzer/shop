<?php
require_once 'autoloader.php';
include ("includes/common.php");
/*if(!isset($_SESSION['userSession'])){
    header("Location: login.php");
}*/
include("includes/header.php");
?>
<main id="main">
    <div id="products">
        <div id="miniCupcakes">
            <a href="minicupcakes.php<?php echo $lang['LINK_LANG']; ?>"><h2>Mini-Cupcakes</h2></a>
            <img src="img/miniCupcakes.png" id="img">
            <img src="img/redbandmini.jpg" id="img">
        </div>

        <div id="cupcakes">
            <a href="cupcakes.php<?php echo $lang['LINK_LANG']; ?>"><h2>Cupcakes</h2></a>
            <img src="img/2_chocolatechip.jpg" id="img">
            <img src="img/choco.jpg" id="img">
        </div>

        <div id="cakes">
            <a href="cakes.php<?php echo $lang['LINK_LANG']; ?>"><h2>Cakes</h2></a>
            <img src="img/cake.jpg" id="img">
            <img src="img/rosecake.jpg" id="img">
        </div>
    </div>
</main>
<? include("includes/footer.php");?>