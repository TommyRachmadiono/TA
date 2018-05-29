<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

switch ($act) {
	case 'add_photo':
	$title = mysqli_real_escape_string($conn, $_POST["title"]);

	$user_id = $_COOKIE['user_id'];
	$file_name = basename($tglupload . $_FILES["file"]["name"]);
	$tglupload = date('YmdHis');
	$target_dir = "images/gallery/";
	$target_file = $target_dir . $tglupload . $_FILES['file']['name'];
	$uploadOk = 1;

    //BATASI FILE CUMAN 5MB
	if ($_FILES["file"]["size"] > 5485760) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			$sql = "INSERT INTO gallery (title, file, user_id)
			VALUES ('$$title', '$file_name', '$user_id')";
			if (mysqli_query($conn, $sql)) {
				echo '<script type="text/javascript">alert("Berhasil menambahkan foto gallery"); </script>';
				echo '<script type="text/javascript"> window.location = "gallery.php" </script>';
				$conn->close();
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
			echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
		}
	}
}

break;

case 'edit_photo':
		# code...
break;

case 'delete_photo':
$gallery_id = mysqli_real_escape_string($conn, $_POST["gallery_id"]);
$sql = "DELETE FROM gallery WHERE id = '$gallery_id'";
if(mysqli_query($conn,$sql)) {
	echo '<script type="text/javascript">alert("Berhasil menghapus foto gallery"); </script>';
	echo '<script type="text/javascript"> window.location = "gallery.php" </script>';
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
break;

}
?>