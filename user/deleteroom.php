<?php

    include('../conn.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    session_start();
    $del = 0;

    $id = $_POST["id"];
    $del = $_POST["del"];

    if($del == 1){
        $query = mysqli_query($conn,"DELETE FROM chatroom WHERE userid='$_SESSION[id]' and chatroomid= '$id'");
    }

$conn->close();

?>