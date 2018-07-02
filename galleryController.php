<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

switch ($act) {
	case 'add_gallery':
	$title = mysqli_real_escape_string($conn, $_POST["title"]);

	$user_id = $_COOKIE['user_id'];
	$tglupload = date('YmdHis');
	$file_name = basename($tglupload . $_FILES["file"]["name"]);
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
			VALUES ('$title', '$file_name', '$user_id')";
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
	break;

	case 'delete_gallery':
	$gallery_id = mysqli_real_escape_string($conn, $_POST["gallery_id"]);
	$dir = "images/gallery/";

	$sql2 = "SELECT * FROM gallery WHERE id = '$gallery_id'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		while ($row2 = $result2->fetch_assoc()) {
			$file = $row2['file'];
		}
	}

	if(unlink($dir.$file)) {
		$sql = "DELETE FROM gallery WHERE id = '$gallery_id'";
		if(mysqli_query($conn,$sql)) {
			echo '<script type="text/javascript">alert("Berhasil menghapus foto gallery"); </script>';
			echo '<script type="text/javascript"> window.location = "gallery.php" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	break;

	case 'add_achievement':
	$title = mysqli_real_escape_string($conn, $_POST["title"]);
	$description = mysqli_real_escape_string($conn, $_POST["description"]);

	$user_id = $_COOKIE['user_id'];
	$tglupload = date('YmdHis');
	$file_name = basename($tglupload . $_FILES["file"]["name"]);
	$target_dir = "images/achievements/";
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
			$sql = "INSERT INTO achievement (title, description, file, user_id)
			VALUES ('$title', '$description', '$file_name', '$user_id')";
			if (mysqli_query($conn, $sql)) {
				echo '<script type="text/javascript">alert("Berhasil menambahkan foto achievement"); </script>';
				echo '<script type="text/javascript"> window.location = "student_achievement.php" </script>';
				$conn->close();
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
			echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
		}
	}
	break;

	case 'delete_achievement':
	$achievement_id = mysqli_real_escape_string($conn, $_POST["achievement_id"]);
	$dir = "images/achievements/";

	$sql2 = "SELECT * FROM achievement WHERE id = '$achievement_id'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		while ($row2 = $result2->fetch_assoc()) {
			$file = $row2['file'];
		}
	}

	if(unlink($dir.$file)) {
		$sql = "DELETE FROM achievement WHERE id = '$achievement_id'";
		if(mysqli_query($conn,$sql)) {
			echo '<script type="text/javascript">alert("Berhasil menghapus achievement"); </script>';
			echo '<script type="text/javascript"> window.location = "student_achievement.php" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	break;
}
?>