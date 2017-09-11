<?php
    
    include('../conn.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    session_start();
    

    $nome = $_POST["chat_name"];
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');
    $senha = $_POST["chat_password"];

    $query = mysqli_query($conn,"INSERT INTO chatroom (chat_name, date_created, chat_password, userid) values ('$nome','$date','$senha', '$_SESSION[id]'");

    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();

?>