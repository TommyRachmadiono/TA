<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["username"]);

setcookie("login", true, time()-1);

session_unset(); 
session_destroy();

echo '<script type="text/javascript">alert("LOGOUT SUCCESS"); </script>';

echo '<script type="text/javascript"> window.location = "index.php" </script>';
?>