<?php

session_start();
include 'config/connectdb.php';

$username = strtolower(mysqli_real_escape_string($conn, $_POST["username"])); 
$password = strtolower(mysqli_real_escape_string($conn, $_POST['password']));

$sql = "SELECT u.*, k.nama_kelas FROM user u LEFT JOIN kelas k on u.kelas_id = k.id WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $_SESSION['role'] = $row['role'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['foto_profil'] = $row['foto'];
        $_SESSION["nama_kelas"] = $row['nama_kelas'];
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;

        setcookie("login", true, time() + 3600);
        setcookie("user_id", $_SESSION["user_id"], time() + 3600);
        setcookie("username", $_SESSION["username"], time() + 3600);
        setcookie("foto_profil", $_SESSION["foto_profil"], time() + 3600);
        setcookie("role", $_SESSION["role"], time() + 3600);
        setcookie("nama_kelas", $_SESSION["nama_kelas"], time() + 3600);

        echo '<script type="text/javascript">alert("Welcome ' . $_SESSION['nama'] . '"); </script>';
        echo '<script type="text/javascript"> window.location = "index.php" </script>';
    }
} else {
    echo '<script type="text/javascript">alert("Username atau password salah"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>
