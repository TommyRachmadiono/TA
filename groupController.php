<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

switch ($act) {
	case 'create_group':
	$topic_discussion=$_POST["topic_discussion"];
	$user_id=$_SESSION['user_id'];
	$tgl_dibuat = date("Y/m/d");
	$group_id = '';

	$sql = "INSERT INTO grup (topik_grup, user_id, tgl_dibuat)
	VALUES ('$topic_discussion', '$user_id', '$tgl_dibuat')";
		if ($conn->query($sql) === TRUE) {
		$query = "SELECT * FROM `grup` order by id DESC LIMIT 1";
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
    	// output data of each row
			while($row = $result->fetch_assoc()) {
				$group_id = $row['id'];
			}
		}
		$sql2 = "INSERT INTO `anggota` (`grup_id`, `user_id`, `tgl_join`) VALUES ('$group_id', '$user_id', '$tgl_dibuat');";
		$conn->query($sql2);

		echo '<script type="text/javascript">alert("Created New Group Successfully"); </script>';
		echo '<script type="text/javascript"> window.location = "index.php" </script>';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	break;

	case 'invite_member':
		# code...
	break;
}
?>