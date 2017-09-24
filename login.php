<?php
    session_start();
    include('conn.php');

    //Variáveis que o usuario inseriu
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $senha = md5($senha);

    //Query para procurar um usuario e senha iguais
    $query = "SELECT * FROM user WHERE username = '$usuario' AND password = '$senha'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {    //Caso encontre algum resultado no BD
        //Coloca o resultado na variavel $row
        $row = $result->fetch_assoc();
        //Coloca o ID numa session para utilizar nas outras páginas
        $_SESSION["id"] = $row["userid"];
        ?>
        <script>
            window.alert('Logado com sucesso!');
            window.location.replace("user/index.php");
        </script>
        <?php
    } else { //Caso não encontre
        ?>
        <script>
            window.alert('Login inválido, tente novamente!');
            window.location.replace("index.php");
        </script>
        <?php
    }
    //Fechar conexão com banco de dados
    $conn->close();

?>