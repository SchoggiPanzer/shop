<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: admin_log.php");
}
?>
<!DOCTYPE html>
<html>
<body>
<a href='admin_logout.php'> Logout</a ><br />

<a href="update.php">Change a Product</a>
</body>
</html>