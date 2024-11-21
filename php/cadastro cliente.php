<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST["nome"];
    $CPF = $_POST["CPF"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $sql = "INSERT INTO cliente (nome, CPF, email , telefone) Values ('$nome' , '$CPF' , '$email' , '$telefone')";
    if($conn -> query($sql) === true){
        echo"Novo registro adiocionado";
    }else{
        echo"Erro". $slq ."<br>".$conn -> error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div>
        <p>Cadastro de clientes</p>
        <form method="POST">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome">
            <label for="CPF">CPF</label>
            <input type="text" name="CPF">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
