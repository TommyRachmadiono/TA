<?php
include_once 'config/connectdb.php';

$event_name = mysqli_real_escape_string($conn, $_POST["event_name"]);
$event_description = mysqli_real_escape_string($conn, $_POST["event_description"]);
$start_date = mysqli_real_escape_string($conn, $_POST["start_date"]);
$end_date = mysqli_real_escape_string($conn, $_POST["end_date"]);
$created = date("Y/m/d");
$user_id = $_COOKIE['user_id'];

if(strtotime($start_date) <= strtotime($end_date)) {
	$sql = "INSERT INTO events (title, description, start_date, end_date, created, user_id)
	VALUES ('$event_name', '$event_description', '$start_date', '$end_date', '$created', '$user_id')";

	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Berhasil menambahkan event baru"); </script>';
		echo '<script type="text/javascript"> window.location = "event_calendar.php" </script>';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
} else {
	echo '<script type="text/javascript">alert("Tanggal selesai tidak boleh lebih kecil dari tanggal mulai"); </script>';
	echo '<script type="text/javascript"> window.location = "event_calendar.php" </script>';
}

mysqli_close($conn);
?>