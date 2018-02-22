<?php
session_start();
include 'config/connectdb.php';


$topic_discussion=$_POST["topic_discussion"];
$user_id=1;
$tgl_dibuat = date("Y/m/d");

$sql = "INSERT INTO grup (topik_grup, user_id, tgl_dibuat)
VALUES ('$topic_discussion', '$user_id', '$tgl_dibuat')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: groupDiscussion.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>