<?php
  session_start();
  include "conn.php";
    
  $nome = $_POST['name'];
  $usuario = $_POST['username'];
  $senha = $_POST['password'];
      
  $situacaoU = ""; //erro de usuario igual
  $situacao = ""; //erros gerais
  
  $query = "SELECT * FROM user WHERE username = '$usuario'";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if($result->num_rows > 0){//se encontrar um usuario igual
    $situacaoU = "Usuario já Registrado";
  }

  if($situacaoU === ""){//insere se nao tiver iguais
    $senha = md5($senha);
    $query = "INSERT INTO user (uname,password,username,access) VALUES ('$nome','$senha','$usuario',2);";
    if($conn->query($query)){
      $situacao = "Deu certo";
      header("Location: index.php");
    }else{
      $situacao = "Deu errado ";
    }
  }

  $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <h1>Geral:<?=$situacao?></h1>
    <h1>Usuario igual:<?=$situacaoU?></h1>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>