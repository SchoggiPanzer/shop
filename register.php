<?php
require_once 'autoloader.php';
if (isset($_SESSION['userSession']) != "") {
    header("Location: index.php");
}
include ("includes/common.php");
include("includes/header.php");

if (isset($_POST['btn-signup'])) {
    $uname = DB::getInstance()->real_escape_string(trim($_POST['user_name']));
    $email = DB::getInstance()->real_escape_string(trim($_POST['user_email']));
    $upass = DB::getInstance()->real_escape_string(trim($_POST['password']));
    $cupass = DB::getInstance()->real_escape_string(trim($_POST['con_password']));

    if($upass == $cupass) {


        $new_password = password_hash($upass, PASSWORD_DEFAULT);

        $check_email = DB::doQuery("SELECT email FROM users WHERE email='$email'");
        $check_usern = DB::doQuery("SELECT username FROM users WHERE username='$uname'");
        $count = $check_email->num_rows;
        $countusern = $check_usern->num_rows;

        if ($count == 0) {

            if($countusern == 0){


                $query = "INSERT INTO users(username,email,password) VALUES('$uname','$email','$new_password')";


                if (DB::doQuery($query)) {
                    $msg = $lang['ALERT_OK'];
                echo "<script type='text/javascript'> swal(\"Wuhuu!\", \"$msg\", \"success\");</script>";
                } else {
                    $msg = $lang['ALERT_ERR'];
                    echo "<script type='text/javascript'> swal(\"Uups!\", \"$msg\", \"error\");</script>";
                }

            }else{
                $msg = $lang['ALERT_USER'];
                echo "<script type='text/javascript'> swal(\"Uups!\", \"$msg\", \"error\");</script>";
            }

        } else {
            $msg = $lang['ALERT_EMAIL'];
            echo "<script type='text/javascript'> swal(\"Hmm\", \"$msg\", \"error\");</script>";

        }
    }else{
        $msg = $lang['ALERT_PW'];
        echo "<script type='text/javascript'> swal(\"Hmm\", \"$msg\", \"error\");</script>";
    }
}
?>

<div class="signin-form">

    <div class="container">


        <form class="form-signin" method="post" id="register-form">

            <h2 class="form-signin-heading"><?php echo $lang['REG_TITLE']?></h2>
            <hr/>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="<?php echo $lang['USERN']?>" name="user_name" required/>
            </div>

            <div class="form-group">
                <input type="useremail" class="form-control" placeholder="<?php echo $lang['EMAIL']?>" name="user_email" required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="<?php echo $lang['PW']?>" name="password" required/>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="<?php echo $lang['PW_CONF']?>" name="con_password" required/>
            </div>

            <hr/>

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-signup">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; <?php echo $lang['BTN_CRTACC']?>
                </button>

                <a href="login.php" class="btn btn-default"><?php echo $lang['BTN_GOLOG']?></a>

            </div>

        </form>
    </div>
</div>
<?php include("includes/footer.php");?>
