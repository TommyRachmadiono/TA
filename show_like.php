<?php
	session_start();
	include 'config/connectdb.php';
	
	if (isset($_POST['showlike'])){
		$id = $_POST['id'];
		$query2=mysqli_query($conn,"select * from `like` where postid='$id'");
		echo mysqli_num_rows($query2);	
	}
?>

