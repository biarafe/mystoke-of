<?php
include ('conexao.php');


$nome_user = $_POST['nome_user'];
$email_user = $_POST['email_user'];
$tell_user = $_POST['tell_user'];
$senha_user = $_POST['senha_user'];

    $result = mysqli_query($mysqli, "INSERT INTO usuario(nome_user, tell_user, email_user, senha_user) VALUES ('$nome_user', '$tell_user', '$email_user', '$senha_user')");
    
    header("Location: ../MYSTOKOF/LOGuser.php");
?>

