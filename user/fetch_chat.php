<?php
	session_start();

	include "../conn.php";
	$idRoom = $_POST['id'];
	$query = "SELECT * FROM chat WHERE chatroomid = '$idRoom'";
	$result = $conn->query($query);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$userid = $row["userid"];
			$query = "SELECT * FROM user WHERE userid='$userid'";
			$result2 = $conn->query($query);
			$row2 = $result2->fetch_assoc();
        	echo $row["chat_date"]. " - " . $row2["uname"]. " - " . $row["message"]. "<br>";
		}
	}
?>