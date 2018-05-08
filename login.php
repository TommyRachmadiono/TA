<?php
session_start();
include 'config/connectdb.php';

$username = mysqli_real_escape_string($conn ,$_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		// print_r($row);
		
		$_SESSION['role'] = $row['role'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['foto_profil'] = $row['foto'];
		$_SESSION["login"] = true;
		$_SESSION["username"] = $username;

		setcookie("login", true, time()+3600);
		setcookie("user_id", $_SESSION["user_id"], time()+3600);
		setcookie("username", $_SESSION["username"], time()+3600);
		setcookie("foto_profil", $_SESSION["foto_profil"], time()+3600);
		setcookie("role", $_SESSION["role"], time()+3600);

		echo '<script type="text/javascript">alert("Welcome '. $_SESSION['nama'] . '"); </script>';
		echo '<script type="text/javascript"> window.location = "index.php" </script>';

	}
} else {
	echo "Username atau Password salah";
	echo $username;
	echo $password;
}
?>
