<?php
    
    include('../conn.php');
    
    session_start();
    

    $nome = $_POST["chatname"];
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');
    $senha = $_POST["chatpass"];

    $query = mysqli_query("INSERT INTO chatroom (chat_name, date_created, chat_password, userid) values ('$nome','$date','$senha', '$_SESSION[id]')");
    $conn->exec($query);

    if ($conn->exec($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();

?>