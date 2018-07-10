<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

switch ($act) {
	case 'buat_tugas':
	$namatugas = mysqli_real_escape_string($conn, $_POST["nama_tugas"]);
	$matpel_id = $_SESSION["matpel_id"];
	$week_id = mysqli_real_escape_string($conn, $_POST["week_id"]);


	$sql = "INSERT INTO tugas (namatugas, matpel_id, week_id)
	VALUES ('$namatugas', '$matpel_id', '$week_id')";
	if (mysqli_query($conn, $sql)) {

		$sql2 = "SELECT id FROM tugas ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$tugas_id = $row['id'];
				mkdir('tugas/'.$tugas_id.' '.$namatugas);
			}
		}

		$sql3 = "SELECT * FROM kelas";
		$result2 = $conn->query($sql3);
		if ($result2->num_rows > 0) {
			while ($row = $result2->fetch_assoc()) {
				$kelas = $row['nama_kelas'];
				mkdir('tugas/'.$tugas_id.' '.$namatugas.'/'.$kelas);
			}
		}
		echo '<script type="text/javascript">alert("Berhasil membuat tugas baru"); </script>';
		echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
		
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	break;
	
	case 'delete_tugas':
	$tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
	$matpel_id = $_SESSION["matpel_id"];

	$sql2 = "SELECT * FROM tugas WHERE id = '$tugas_id'";
	$result = $conn->query($sql2);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$dir = 'tugas/'.$row['id'].' '.$row['namatugas'];
		}
	}

	//BUAT DELETE SUB-FOLDER + FILE YANG ADA DALAM FOLDER
	function rrmdir($dir) { 
		if (is_dir($dir)) { 
			$objects = scandir($dir); 
			foreach ($objects as $object) { 
				if ($object != "." && $object != "..") { 
					if (is_dir($dir."/".$object))
						rrmdir($dir."/".$object);
					else
						unlink($dir."/".$object); 
				} 
			}
			rmdir($dir); 
		} 
	}
	rrmdir($dir);

	$sql = "DELETE FROM tugas WHERE id = '$tugas_id'";
	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Berhasil Menghapus Tugas"); </script>';
		echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}	
	break;

	case 'upload_materi':
	$tglupload = date('YmdHis');
	$user_id = $_COOKIE['user_id'];
	$file_name = basename($tglupload . $_FILES["file"]["name"]);
	$matpel_id = $_SESSION["matpel_id"];
	$week_id = mysqli_real_escape_string($conn, $_POST["week_id"]);
	$target_dir = "materi/";
	$target_file = $target_dir . $tglupload . $_FILES['file']['name'];
	$uploadOk = 1;

	//batasi file size 20MB
	if ($_FILES["file"]["size"] > 20857600) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			$sql = "INSERT INTO materi (file, matpel_id, week_id, user_id)
			VALUES ('$file_name', '$matpel_id', '$week_id', '$user_id')";
			if (mysqli_query($conn, $sql)) {
				echo '<script type="text/javascript">alert("Berhasil Upload Materi"); </script>';
				echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
	break;

	case 'delete_materi':
	$matpel_id = $_SESSION["matpel_id"];
	$materi_id = mysqli_real_escape_string($conn, $_POST["materi_id"]);
	$dir = "materi";

	$sql2 = "SELECT * FROM materi WHERE id = '$materi_id'";
	$result = $conn->query($sql2);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$file = $row['file'];
		}
	}

	if(unlink($dir.'/'.$file)){
		$sql = "DELETE FROM materi WHERE id = '$materi_id'"; 
		mysqli_query($conn,$sql);
		echo '<script type="text/javascript">alert("Berhasil Menghapus Materi"); </script>';
		echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
	}
	break;

	case 'upload_tugas':
	$tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
	$user_id = $_COOKIE['user_id'];
	$kelas = $_COOKIE['nama_kelas'];
	$tgldibuat = date("Y/m/d");
	$tglupload = date("YmdHis");
	$file_name = basename($tglupload . $_FILES["file"]["name"]);

	$sql = "SELECT * FROM tugas WHERE id = '$tugas_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$namatugas = $row['namatugas'];
			$path = "tugas/".$tugas_id.' '.$namatugas.'/'.$kelas.'/';
			$target_dir = $path;
		}
	}
	
	$target_file = $target_dir . $tglupload . $_FILES['file']['name'];
	$uploadOk = 1;

	//batasi file size 20MB
	if ($_FILES["file"]["size"] > 20857600) {
		echo '<script type="text/javascript">alert("Your file is too large")</script>';
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo '<script type="text/javascript">alert("Sorry your file is not uploaded")</script>';
                // if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			$sql = "INSERT INTO user_has_tugas (user_id, tugas_id, file, tgl_diupload)
			VALUES ('$user_id','$tugas_id','$file_name', '$tgldibuat')";
			if (mysqli_query($conn, $sql)) {
				echo '<script type="text/javascript">alert("Berhasil Upload Tugas"); </script>';
				echo '<script type="text/javascript"> window.location = "tugas.php?id=' . $tugas_id . '" </script>';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
			echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
		}
	}
	break;

	case 'delete_tugas_user':
	$tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
	$user_id = $_COOKIE['user_id'];
	$dir;

	$sql2 = "SELECT * FROM tugas WHERE id = '$tugas_id'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		while ($row2 = $result2->fetch_assoc()) {
			$namatugas = $row2['namatugas'];
		}
		$dir = "tugas/".$tugas_id.' '.$namatugas.'/';
	}

	$sql = "SELECT * FROM user_has_tugas WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$file = $row['file'];
		}
	}

	if(unlink($dir.'/'.$file)) {
		$sql2 = "DELETE FROM user_has_tugas WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
		if (mysqli_query($conn, $sql2)) {
			echo '<script type="text/javascript">alert("Berhasil Menghapus Tugas"); </script>';
			echo '<script type="text/javascript"> window.location = "tugas.php?id=' . $tugas_id . '" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
	}
	break;

	case 'penilaian':
	$tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
	$user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
	$nilai = mysqli_real_escape_string($conn, $_POST["nilai"]);

	$sql = "UPDATE user_has_tugas SET nilai = '$nilai' WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Berhasil Mengupdate Nilai"); </script>';
		echo '<script type="text/javascript"> window.location = "tugas.php?id=' . $tugas_id . '" </script>';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}	
	break;

	case 'penilaian_massal':
	$kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
	$nilai = mysqli_real_escape_string($conn, $_POST["nilai"]);
	$tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
	$url = mysqli_real_escape_string($conn, $_POST["url"]);

	if($kelas != NULL) {
		$sql = "UPDATE user_has_tugas uht INNER JOIN user u ON uht.user_id = u.id SET uht.nilai = '$nilai' WHERE uht.tugas_id = '$tugas_id' AND u.kelas_id = $kelas";
		if (mysqli_query($conn, $sql)) {
			echo '<script type="text/javascript">alert("Berhasil Mengupdate Semua Nilai"); </script>';
			echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} else {
		$sql = "UPDATE user_has_tugas SET nilai = '$nilai' WHERE tugas_id = '$tugas_id'";
		if (mysqli_query($conn, $sql)) {
			echo '<script type="text/javascript">alert("Berhasil Mengupdate Semua Nilai"); </script>';
			echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	break;

	case 'download_zip':
	$kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
	$tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
	$dir;
	$zip_file;

	$sql = "SELECT * FROM tugas WHERE id = '$tugas_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$namatugas = $row['namatugas'];
		}
		if($kelas == ""){
			$dir = "tugas/".$tugas_id.' '.$namatugas;
		} else {
			$dir = "tugas/".$tugas_id.' '.$namatugas.'/'.$kelas;
		}
		$zip_file = $dir.'.zip';
	}

// Get real path for our folder
	$rootPath = realpath($dir);

// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{
    // Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
        // Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
			$zip->addFile($filePath, $relativePath);
		}
	}

// Zip archive will be created only after closing object
	$zip->close();

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($zip_file));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($zip_file));
	readfile($zip_file);
	unlink($zip_file);
	break;

	case 'add_matpel':
	$nama_pelajaran = mysqli_real_escape_string($conn, $_POST["nama_matpel"]);

	$sql = "INSERT INTO matpel (nama_pelajaran)
	VALUES ('$nama_pelajaran')";
	if (mysqli_query($conn, $sql)) {
		$sql2 = "SELECT id FROM matpel ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$matpel_id = $row['id'];
			}
		} 
		$sql3 = "INSERT INTO matpel_has_week (matpel_id, week_id, title, description)
		VALUES 
		('$matpel_id', '1', '',''),
		('$matpel_id', '2', '',''),
		('$matpel_id', '3', '',''),
		('$matpel_id', '4', '',''),
		('$matpel_id', '5', '',''),
		('$matpel_id', '6', '',''),
		('$matpel_id', '7', '',''),
		('$matpel_id', '8', '',''),
		('$matpel_id', '9', '',''),
		('$matpel_id', '10', '',''),
		('$matpel_id', '11', '',''),
		('$matpel_id', '12', '',''),
		('$matpel_id', '13', '',''),
		('$matpel_id', '14', '','')";
		
		if (mysqli_query($conn, $sql3)) {
			echo '<script type="text/javascript">alert("Berhasil menambah matpel baru"); </script>';
			echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	break;

	case 'edit_matpel':
	$matpel_id = mysqli_real_escape_string($conn, $_POST["matpel_id"]);
	$nama_pelajaran = mysqli_real_escape_string($conn, $_POST["nama_matpel"]);
	$sql = "UPDATE matpel SET nama_pelajaran = '$nama_pelajaran' WHERE id = '$matpel_id'";
	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Berhasil Mengupdate Nama Pelajaran"); </script>';
		echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
	}
	break;

	case 'delete_matpel':
	$matpel_id = mysqli_real_escape_string($conn, $_POST["matpel_id"]);
	$sql = "DELETE FROM matpel_has_week WHERE matpel_id = '$matpel_id'";
	if (mysqli_query($conn, $sql)) {
		$sql2 = "DELETE FROM matpel WHERE id = '$matpel_id'";
		if (mysqli_query($conn, $sql2)) {
			echo '<script type="text/javascript">alert("Berhasil menghapus matpel"); </script>';
			echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
		}
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}	
	break;

	case 'edit_topik':
	$matpel_id = mysqli_real_escape_string($conn, $_POST["matpel_id"]);
	$week_id = mysqli_real_escape_string($conn, $_POST["week_id"]);
	$title = mysqli_real_escape_string($conn, $_POST["title"]);
	$description = mysqli_real_escape_string($conn, $_POST["description"]);

	$sql = "UPDATE matpel_has_week SET title = '$title', description = '$description' WHERE matpel_id = '$matpel_id' AND week_id = '$week_id'";
	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Berhasil Mengupdate Topik dan Deskripsi Week' . $week_id . '") </script>';
		echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id='.$matpel_id.'" </script>';
	}
	break;

}
?>
