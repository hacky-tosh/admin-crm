<?php
		include('dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['user_id'];
		
		echo 'true';
		mysqli_query($conn,"INSERT INTO user_log (username, login_date, user_id, logout_date) VALUES ('$username', NOW(), ".$row['user_id'].", NOW())") or die(mysqli_error());
		 }else{ 
		echo 'false';
		}	
				
		?>