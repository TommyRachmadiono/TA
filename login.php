
<?php
session_start();
include 'config/connectdb.php';

$username = $_POST["username"];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		$_SESSION["login"] = true;
		$_SESSION["username"] = $username;
		setcookie("login", true, time()+3600);
		
		echo '<script type="text/javascript">alert("welcome"); </script>';
		
		echo '<script type="text/javascript"> window.location = "index.php" </script>';

	}
} else {
	echo "Username atau Password salah";
	echo $username;
	echo $password;
}
$conn->close();
?>
