<?php
    session_start();
	include('conn.php');

	$usuario = $_POST['username'];
	$senha = $_POST['password'];

	$senha = md5($senha);
	$query = "SELECT * FROM user WHERE username = '$usuario' AND password = '$senha'";

	$result = $conn->query($query);
	
	if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["userid"];
            header('Location:user/index.php');
	}else{
		header('Location: user/erro.php');
	}

	$conn->close();

?>