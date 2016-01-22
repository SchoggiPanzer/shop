<?php
require_once 'autoloader.php';
if(isset($_SESSION['userSession'])){
    $userSess = $_SESSION['userSession'];
    $user = DB::doQuery("SELECT username FROM users WHERE user_id = '$userSess'");
    if($user){
        $username = $user->fetch_assoc();
    }
}
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = new Cart();
}
$cart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lu's Cakes</title>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/styles/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/styles/sweetalert.css">
    <link href="/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/bootstrap-theme.min.css" rel="stylesheet">
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
<header>
    <nav id="navbar-big" class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="shop-title" class="navbar-brand">Lu's <br> Cakes</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="navbar" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="nav-left" class="nav navbar-nav">
                    <li><a href="index.php<?php echo $lang['LINK_LANG']; ?>"><?php echo $lang['HOME']; ?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $lang['PRODUCTS']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="minicupcakes.php<?php echo $lang['LINK_LANG']; ?>"><?php echo $lang['MINI_CUPCAKES']; ?></a></li>
                            <li><a href="cupcakes.php<?php echo $lang['LINK_LANG']; ?>"><?php echo $lang['CUPCAKES']; ?></a></li>
                            <li><a href="cakes.php<?php echo $lang['LINK_LANG']; ?>"><?php echo $lang['CAKES']; ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="products.php<?php echo $lang['LINK_LANG'];?>"><?php echo $lang['PRODUCTS']; ?></a></li>
                        </ul>
                    </li>
                    <li><a href="order.php<?php echo $lang['LINK_LANG']; ?>"><?php echo $lang['ORDER']; ?></a></li>
                    <li><a href="aboutme.php<?php echo $lang['LINK_LANG']; ?>"><?php echo $lang['MENU_ABOUT_ME']; ?></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!isset($_SESSION['userSession'])){
                        ?><li><button type="submit" class="btn btn-default navbar-btn" name="btn-signup" onclick="location.href='login.php<?php echo $lang['LINK_LANG']; ?>'">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> &nbsp; Login
                        </button></li><?php
                    }else{
                        ?><li><button type="submit" class="btn btn-default navbar-btn" name="btn-signup" onclick="location.href='logout.php<?php echo $lang['LINK_LANG']; ?>'">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> &nbsp; Logout
                        </button></li>
                        <li><a href="login.php<?php echo $lang['LINK_LANG']; ?>'"><?php echo $username['username'] ?></a></li><?php
                    }
                    ?>
                    <li><button type="submit" class="btn btn-default navbar-btn" name="btn-signup" onclick="location.href='show_cart.php<?php echo $lang['LINK_LANG']; ?>'">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> &nbsp; <?php echo $lang['CART']; ?> <span class="badge"><?php $cart->countItem()?></span>
                    </button></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $lang['LANG']?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?lang=de">DE</a></li>
                            <li><a href="?lang=en">EN</a></li>
                            <li><a href="?lang=fr">FR</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
