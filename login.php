
<?php
include 'connectdb.php';


	$username = $_POST["loginuser"];
	$password = $_POST['userpass'];


$sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "nama: " . $row["nama"]. " - username: " . $row["username"]. " password: " . $row["password"]. "<br>";
    }
} else {
    echo "Username atau Password salah";
    echo $username;
    echo $password;
}
$conn->close();
?>
