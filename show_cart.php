<?php
require_once 'autoloader.php';
include("includes/common.php");
if (!isset($_SESSION['userSession'])) {
    header("Location: login.php");
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = new Cart();
}
$cart = $_SESSION['cart'];


include("includes/header.php");
?>
<main id="main">
    <div class="cart">
        <h4><?php echo $lang['CART_TITLE']; ?></h4>
        <?php
        // Render cart explicitly to enhence it
        if ($cart->isEmpty()) {
            $empty = $lang['EMP_CART'];
            echo "<div><p>$empty</p></div>";
        } else {
            $art = $lang['ARTICLE'];
            $pr = $lang['PRICE'];
            $tot = $lang['TOTAL'];
            $rem = $lang['REMOVE'];
            echo "<div><table class=\"table table-stripped\" style=\"background-color:white;\"'>";
            echo "<tr><th>Id</th><th>$art</th><th>#</th><th>$pr</th><th>$tot</th><th></th></tr>";
            $total = 0;
            foreach ($cart->getItems() as $item => $num) {
                // Get product information
                $product = Product::getProductById($item, $_GET['lang']);
                if ($product == null) continue;
                $price = $product['price'];
                $total += $price * $num;
                echo "<tr><td>$item</td><td>{$product['title']}</td><td>$num</td><td>{$price}.-</td><td>" . ($price * $num) . ".-</td>
                <td><form action='cart_action.php' method='post'>
                <input type=\"hidden\" name=\"rmitem[adr]\" value=\"show_cart.php".$lang['LINK_LANG']."\"/>
                <input name=\"rmitem[rmid]\" type='hidden' value='$item'/>
                <select name=\"rmitem[rmnum]\">
                            <option>6</option>
                            <option>12</option>
                            <option>18</option>
                            <option>24</option>
                </select>
                <input type='submit' class='btn btn-danger' value='$rem'/></form>
                </td></tr>";
            }
            echo "<tr><td></td><td></td><td></td><td></td><td>$total.-</td><td></td></tr>";
            echo "</table></div>";
        }
        if(!$cart->isEmpty()){
            echo "<button type=\"button\" class=\"btn btn-info\">".$lang['BUY']."</button>";
        }?>
    </div>
</main>
<?php include("includes/footer.php"); ?>
