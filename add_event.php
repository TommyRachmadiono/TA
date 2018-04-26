<?php
include_once 'config/connectdb.php';

$event_name = mysqli_real_escape_string($conn, $_POST["event_name"]);
$event_description = mysqli_real_escape_string($conn, $_POST["event_description"]);
$start_date = mysqli_real_escape_string($conn, $_POST["start_date"]);
$end_date = mysqli_real_escape_string($conn, $_POST["end_date"]);
$created = date("Y/m/d");

$sql = "INSERT INTO events (title, description, start_date, end_date, created)
VALUES ('$event_name', '$event_description', '$start_date', '$end_date', '$created')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Berhasil menambahkan event baru"); </script>';
    echo '<script type="text/javascript"> window.location = "event_calendar.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>