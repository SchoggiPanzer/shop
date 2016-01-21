<?php
require_once '../autoloader.php';
if (isset($_POST['btn-login'])) {
    $username = DB::getInstance()->real_escape_string(trim($_POST['user_name']));
    $upass = DB::getInstance()->real_escape_string(trim($_POST['password']));

    $query = DB::doQuery("SELECT * FROM admin WHERE admin_name='$username'");
    $row = $query->fetch_array();

    if (password_verify($upass, $row['password'])) {
        $_SESSION['admin'] = $row['id'];
        $_SESSION['adminlogged'] = true;
        header("Location: index.php");
    } else {
        $msg = "fail";
    }
} ?>
<!DOCTYPE html>
<html>
<body>
<div>

    <div>

        <form method="post">

            <h2>Admin Login</h2>

            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
            <div>
                <input type="text" placeholder="Admin-Name" name="user_name" required/>
            </div>

            <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required/>
            </div>


            <div>
                <button type="submit" name="btn-login" id="btn-login">Login</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>