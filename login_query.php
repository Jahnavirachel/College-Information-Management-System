<?php
	session_start();
 
	require_once 'conn.php';
 
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['pwd'] != ""){
			$username = $_POST['username'];
			$pwd = $_POST['pwd'];
			$sql = "SELECT * FROM `registration` WHERE `username`=? AND `pwd`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$pwd));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['mem_id'];
				header("location: download.html");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'login.php'</script>
				";
			}
		}else{
			echo "
            <script>alert('Please complete the required field!')</script>
				<script>window.location = 'login.php'</script>
			";
		}
	}
?>