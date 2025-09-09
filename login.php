<?php

$mysqli = new mysqli("localhost", "root", "root", "login_db");
if ($mysqli -> connect_error){
    die("Erro de Conexão: " . $mysqli->connect_erro);
}

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user = $POST["username"];
    $pass = $POST["password"];

    $stmt = $mysqli->prepare(("SELECT id, username, senha FROM usuarios WHERE
    username=? AND senha=? "));
    $stmt -> bind_param("ss",$user,$pass);
    $stmt -> execute();

    $result = stmt->get_result();
    $dados = $result->fetch_assoc();

}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Simples</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

    <p><small> admin / 123</small></p>
</body>
</html>