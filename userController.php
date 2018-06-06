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
	$kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
	$ortu_id = mysqli_real_escape_string($conn, $_POST["ortu"]);
	$tglupload = date('YmdHis');
	$file_name = basename($tglupload . $_FILES["file"]["name"]);

	$target_dir = "images/fotoprofil/";
	$target_file = $target_dir . $tglupload . $_FILES['file']['name'];
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;

            //BATASI FILE CUMAN 5MB
	if ($_FILES["file"]["size"] > 5485760) {
		echo '<script type="text/javascript">alert("Your file too big, max 5mb"); </script>';
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed."); </script>';
	$uploadOk = 0;
}

if ($uploadOk == 0) {
	echo '<script type="text/javascript">alert("Fail to insert new user"); </script>';
                // if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

		$sql = "INSERT INTO user (nama, username, password, role, kelas_id, ortu_id, foto)
		VALUES ('$nama', '$username', '$password', '$role', $kelas, $ortu_id, '$file_name')";
		if (mysqli_query($conn, $sql)) {
			echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
			echo '<script type="text/javascript"> window.location = "master_user.php" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
break;

case 'edit_user':
		# code...
break;

case 'delete_user':
$dir = "images/fotoprofil";
$user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

$sql2 = "SELECT * FROM user WHERE id = '$user_id'";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$file = $row['foto'];
	}
}

$sql = "DELETE FROM user WHERE id = '$user_id'";
if(mysqli_query($conn,$sql)) {
	if(unlink($dir.'/'.$file)){
		echo '<script type="text/javascript">alert("Berhasil menghapus user"); </script>';
		echo '<script type="text/javascript"> window.location = "master_user.php" </script>';
	}
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
break;

}

?>