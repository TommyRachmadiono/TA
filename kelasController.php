<?php

session_start();
include 'config/connectdb.php';

$act = $_POST["act"];
if ($_SESSION['login'] == true) {

	switch ($act) {
		case 'add_kelas':
		$nama_kelas = mysqli_real_escape_string($conn, $_POST["nama_kelas"]);

		$sql = "INSERT INTO kelas (nama_kelas)
		VALUES ('$nama_kelas')";
		if (mysqli_query($conn, $sql)) {

			$query = "SELECT * FROM tugas";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$namatugas = $row['namatugas'];
					$tugas_id = $row['id'];
				}
			}

			mkdir('tugas/' . $tugas_id . ' ' . $namatugas . '/' . $nama_kelas);
			echo '<script type="text/javascript">alert("Berhasil menambah kelas baru"); </script>';
			echo '<script type="text/javascript"> window.location = "master_kelas.php" </script>';
		} else {
			echo '<script type="text/javascript">alert("Nama kelas tidak boleh sama"); </script>';
			echo '<script type="text/javascript"> window.location = "master_kelas.php" </script>';
		}
		break;

		case 'delete_kelas':
		$kelas_id = mysqli_real_escape_string($conn, $_POST["kelas_id"]);

		$sql2 = "SELECT * FROM kelas WHERE id = '$kelas_id'";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			while ($row2 = $result2->fetch_assoc()) {
				$nama_kelas = $row2['nama_kelas'];
			}
		}

		 //BUAT DELETE SUB-FOLDER + FILE YANG ADA DALAM FOLDER
		function rrmdir($dir) {
			if (is_dir($dir)) {
				$objects = scandir($dir);
				foreach ($objects as $object) {
					if ($object != "." && $object != "..") {
						if (is_dir($dir . "/" . $object))
							rrmdir($dir . "/" . $object);
						else
							unlink($dir . "/" . $object);
					}
				}
				rmdir($dir);
			}
		}

		$query2 = "SELECT * FROM tugas";
		$result2 = $conn->query($query2);
		if ($result2->num_rows > 0) {
			while ($row2 = $result2->fetch_assoc()) {
				$tugas_id = $row2['id'];
				$dir = 'tugas/' . $row2['id'] . ' ' . $row2['namatugas'] . '/' . $nama_kelas;

				rrmdir($dir);
			}
		}

		$sql = "DELETE FROM kelas WHERE id = '$kelas_id'";
		if (mysqli_query($conn, $sql)) {


			echo '<script type="text/javascript">alert("Berhasil Menghapus kelas"); </script>';
			echo '<script type="text/javascript"> window.location = "master_kelas.php" </script>';
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		break;
	}
} else {
	echo '<script type="text/javascript">alert("Silahkan Login Terlebih Dahulu"); </script>';
	echo '<script type="text/javascript"> window.location = "index.php" </script>';
}