<?php
// sessão iniciada pra mandar a variavel email do usuario que fez login pra diversos lugares
session_start();
include_once('conexao.php');
if(isset($_POST['email_user']) || isset($_POST['senha_user'])) {

    if(strlen($_POST['email_user'])== "" ) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha_user'])== "" ) {
        echo "Preencha sua senha";
    } else {

        $email_user = $mysqli->real_escape_string($_POST['email_user']);
        $senha_user = $mysqli->real_escape_string($_POST['senha_user']);
        $_SESSION['email_user'] = $email = $_POST['email_user'];


        $sql_code = "SELECT * FROM usuario WHERE email_user = '$email_user' AND senha_user = '$senha_user'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $sql = mysqli_query($mysqli, "SELECT * FROM usuario WHERE email_user = '$email_user'");
        while ($result = mysqli_fetch_array($sql)){
            $id_usuario = $result['id_usuario'];
            $id_sessao = $result['id_sessao'];
        };

        $quantidade = $sql_query->num_rows;
        if($quantidade == 1) {

            $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['id_sessao'] = $id_sessao;
            header('home.html'); //nome da pag inicial ,onde o usuario sera direcionado pos cadastro//

        } else {
            $_SESSION['erro-login'] = "<p style='color: red;'>Falha ao Logar! E-mail ou senha incorretos</p>";
            header('Location: ../abacadastro/abadeentrada.php');
        }
    }
}
?>