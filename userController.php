<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

switch ($act) {
	case 'add_user':
	$nama = mysqli_real_escape_string($conn, $_POST["nama"]);
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	$role = mysqli_real_escape_string($conn, $_POST["role"]);
	$jurusan = mysqli_real_escape_string($conn, $_POST["jurusan"]);

	$sql = "INSERT INTO user (nama, username, password, role, jurusan, foto)
	VALUES ('$nama','$username','$password', '$role', '$jurusan', '')";
	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
		echo '<script type="text/javascript"> window.location = "master_user.php" </script>';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	break;

	case 'edit_user':
		# code...
	break;

	case 'delete_user':
	$user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
	$sql = "DELETE FROM user WHERE id = '$user_id'";
	if(mysqli_query($conn,$sql)) {
		echo '<script type="text/javascript">alert("Berhasil menghapus user"); </script>';
		echo '<script type="text/javascript"> window.location = "master_user.php" </script>';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	break;

}

?>