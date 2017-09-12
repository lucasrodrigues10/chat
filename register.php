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
    ?>
        <script>
          window.alert('Usuário já registrado, tente outro!');
          window.history.back();
      </script>
    <?php
  }

  if($situacaoU === ""){//insere se nao tiver iguais
    $senha = md5($senha);
    $query = "INSERT INTO user (uname,password,username,access) VALUES ('$nome','$senha','$usuario',2);";
    if($conn->query($query)){
      ?>
        <script>
          window.alert('Registrado com sucesso!');
          window.location.replace("index.php");
      </script>
    <?php
    }else{
      ?>
        <script>
          window.alert('Ocorreu algum erro, tente novamente!');
          window.history.back();
      </script>
    <?php
    }
  }

  $conn->close();
?>
