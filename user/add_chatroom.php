<?php
    
    include('../conn.php');
    
    session_start();
    
    $name = $_POST["chatname"];
    $password = $_POST["chatpass"];
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');
    $id = $_SESSION['id'];

    $query = ("INSERT INTO chatroom (chat_name, date_created, chat_password, userid) values ('$name','$date','$password', '$id')"); 

    if ($conn->query($query) === TRUE) {
        echo "Tudo certo na query";
    } else {
        echo "Error " . $conn->error;
    }

    $conn->close();

?>