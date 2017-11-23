<?php
session_start();
if(isset($_REQUEST['valid'])){
	if(isset($_REQUEST['phone'])){
		$phone = $_REQUEST['phone'];
		$conn = new mysqli("localhost","root","","test");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM phonedir WHERE numbers='$phone'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			
			echo "verified";
			while($row = $result->fetch_assoc()) {
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['user_mobile'] = $_REQUEST['phone'];
			}
			
		} else {
			echo "Phone number not registered";
		}
		$conn->close();
	}else{
		echo "Please enter phone number";
	}
	die;
}

die;
