<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Your = $_POST['Your'];

	// Database connection
	$conn = new mysqli('localhost','root','','quinz');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact (Name, Email, Your) values(?, ?, ?)");
		$stmt->bind_param("sss", $Name, $Email,  $Your);
		$execval = $stmt->execute();
		echo $execval;
		echo " Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>