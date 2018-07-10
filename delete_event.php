<?php
include_once 'config/connectdb.php';

$event_id = mysqli_real_escape_string($conn, $_POST["event_id"]);

$sql = "DELETE FROM events WHERE id = '$event_id'";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Berhasil Menghapus event id '. $event_id .'"); </script>';
    echo '<script type="text/javascript"> window.location = "event_calendar.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>