<?php
  //Variaveis para conexao com o banco de dados
  $host = 'localhost'; 
  $usuario = 'id2877653_root123';
  $senha = '12345';
  $database = 'id2877653_chatdb';

  //Conexao com o banco de dados
  $conn = new mysqli($host,$usuario,$senha,$database);

  //Checa se tem erro
  if($conn->connect_error){
    die("Erro: " . $conn->connect_error);
  }
?>