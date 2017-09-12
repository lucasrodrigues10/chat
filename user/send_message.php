<?php
    
    include('../conn.php');
    
    session_start();
    
    $msg = $_POST["msg"];
    $idRoom = $_POST["id"];
    $idUser = $_SESSION["id"];
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');

    $query = ("INSERT INTO chat (userid, chatroomid, message, chat_date) values ('$idUser','$idRoom','$msg', '$date')"); 

    if ($conn->query($query) === TRUE) {
        echo "Tudo certo na query";
    } else {
        echo "Error " . $conn->error;
    }

    $conn->close();

?>