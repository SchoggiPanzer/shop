<?php
include_once 'autoloader.php';
include ("includes/common.php");

if(isset($_SESSION['userSession'])!="")
{
    header("Location: index.php");
    exit;
}

if(isset($_POST['btn-login']))
{
    $username = DB::getInstance()->real_escape_string(trim($_POST['user_name']));
    $upass = DB::getInstance()->real_escape_string(trim($_POST['password']));

    $query = DB::doQuery("SELECT * FROM users WHERE username='$username'");
    $row=$query->fetch_array();

    if(password_verify($upass, $row['password']))
    {
        $_SESSION['userSession'] = $row['user_id'];
        $_SESSION['logged'] = true;
        header("Location: index.php");
    }
    else
    {
        $msg = $lang['LOG_ALERT'];
    }
}
include ("includes/header.php");
?>
<div class="signin-form">

    <div class="container">


        <form class="form-signin" method="post" id="login-form">

            <h2 class="form-signin-heading"><?php echo $lang['LOGIN_TITLE']?></h2>

            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="<?php echo $lang['USERN']?>" name="user_name" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="<?php echo $lang['PW']?>" name="password" required />
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> &nbsp; <?php echo $lang['BTN_LOGIN']?>
                </button>

                <a href="register.php" class="btn btn-default"><?php echo $lang['BTN_REG']?></a>

            </div>
        </form>
    </div>
</div>
<?php include ("includes/footer.php");?>