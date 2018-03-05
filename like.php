<?php
session_start();
include 'config/connectdb.php';

if (isset($_POST['like'])){	
		
		$id = $_POST['id'];
		$query=mysqli_query($conn,"select * from `like` where post_id='$id' and user_id='".$_SESSION['user_id']."'") or die(mysqli_error());
		
		if(mysqli_num_rows($query)>0){
			mysqli_query($conn,"delete from `like` where user_id='".$_SESSION['user_id']."' and post_id='$id'");
		}
		else{
			mysqli_query($conn,"insert into `like` (user_id,post_id) values ('".$_SESSION['user_id']."', '$id')");
		}
	}	
?>