<?php
session_start();
unset($_SESSION["username"]);

$_SESSION["login"] = false;
echo '<script type="text/javascript">alert("LOGOUT SUCCESS"); </script>';

echo '<script type="text/javascript"> window.location = "index.php" </script>';
?>