<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sql = "INSERT INTO funcionario (nome, email ) Values ('$nome' ,'$email')";
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
    <title>Cadastro Funcionario</title>
</head>
<body>
    <div>
        <p>Cadastro de Funcionario</p>
        <form method="POST">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome">
            <label for="email">Email</label>
            <input type="email" name="email">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
