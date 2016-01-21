<?php
require_once 'autoloader.php';
include ("includes/common.php");
include ("includes/header.php");
?>
<main id="main">
    <div id="cont" class="container-fluid">
        <div id="cont-left" class="container-fluid">
            <div id="cont-up">
               <h1><?php echo $lang['BUTTON_TEXT'];?></h1>
               <button id="btn-products" class="btn btn-info btn-lg" onclick="location.href='products.php<?php echo $lang['LINK_LANG']; ?>'">
                   <?php echo $lang['TO_THE_OFFER'];?>
               </button>
            </div>
            <div id="cont-down" class="container-fluid">
                <h1><u>Hey</u></h1>
                <p><?php echo $lang['INDEX_CONTENT'];?></p>
            </div>
        </div>
        <div id="cont-right" class="container-fluid">
            <p id="first"><?php echo $lang['INDEX_TITLE_FIRST'];?></p>
            <p id="sec"><?php echo $lang['INDEX_TITLE_SEC'];?></p>
        </div>
    </div>

</main>
<?include ("includes/footer.php");?>




