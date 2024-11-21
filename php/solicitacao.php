<?php
  include "db.php";

  $query_cliente = $conn->query("SELECT * FROM cliente");

  $query_funcionario = $conn->query("SELECT * FROM funcionario");

  if($_SERVER['REQUEST_METHOD'] === "POST"){
    $id_cliente = $_POST['cliente'];
    $descricao = $_POST['descricao'];
    $urgencia = $_POST['urgencia'];
    $status = $_POST['status'];
    $data_abertura = $_POST['data_abertura'];
    $id_funcionario = $_POST['id_funcionario'];

    if($id_cliente == null){
        echo('Cliente inválido!');
        die(".");
    }

    if($id_funcionario == 0){
        $query = "INSERT INTO solicitacao (id_cliente, descricao, urgencia, status_solicitacao, data_abertura)
        VALUES ($id_cliente, '$descricao', '$urgencia', '$status', '$data_abertura')";
            if($conn -> query($query) === TRUE){
                echo "Dados Enviados!";
                header('');
            } else{
                echo 'Erro ';
            }
    } else {
        $query = "INSERT INTO solicitacao (id_cliente, descricao, urgencia, status_solicitacao, data_abertura, id_funcionario)
        VALUES ($id_cliente, '$descricao', '$urgencia', '$status', '$data_abertura', $id_funcionario)";
            if($conn -> query($query) === TRUE){
                echo "Dados Enviados!";
                header('');
            } else{
                echo 'Erro';
            }
    }   
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitacao</title>
</head>
<body>
    <div>
        <p>Solicitacao Create</p>
        <form method="POST">
        <label for="cliente">Cliente:</label>
            <select name="cliente">
                <?php if($query_cliente -> num_rows > 0){ ?>
                    <option value="">Selecione uma Opção</option>
                        
                        <?php while($row_cliente = $query_cliente->fetch_assoc()){

                            ?> <option value="<?php echo $row_cliente['id_cliente'];?>"><?php echo $row_cliente['nome']; ?></option>

                <?php           }?>
                <?php       } else { ?>
                    <option> <?php echo 'Não há Clientes Cadastrados'; ?> </option>
                <?php } ?>
            </select>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao">
            <label for="data_abertura">Data Abertura</label>
            <input type="date" name="data_abertura">
            <label for="urgencia">Urgencia</label>
            <select name="urgencia">
                <option>Escolha uma urgencia</option>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
            <label for="status">Status</label>
            <select name="status">
                <option value="pendente">Pedente</option>
                <option value="em_andamento">Em Andamento</option>
                <option value="finalizada">Finalizada</option>
            </select>
            <label for="">Funcionario:</label>
            <select name="funcionario">
                <?php if($query_funcionario -> num_rows > 0){ ?>
                    <option value="">Selecione uma Opção</option>
                        
                    <?php while($row_funcionario = $query_funcionario->fetch_assoc()){

                    ?> <option value="<?php echo $row_funcionario['id_funcionario'];?>"><?php echo $row_funcionario['nome']; ?></option>

                <?php           }?>

                <?php       } else { ?>
                    <option> <?php echo 'Não há Funcionarios Cadastrados'; ?> </option>
                <?php } ?>
            </select>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
