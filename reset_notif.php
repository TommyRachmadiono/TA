<?php
include_once 'config/connectdb.php';

$user_id = $_POST["user_id"];

$sql = "UPDATE notif_socmed SET seen = 1 WHERE id_penerima = '$user_id'";
if ($conn->query($sql) === TRUE) {
	
} else {
	echo "Error updating record: " . $conn->error;
}
?>