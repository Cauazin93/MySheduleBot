<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

<?php
// Inclui o arquivo de conexão com o banco de dados
require("../conecta.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome_paciente'];
    $cpf = $_POST['cpf_paciente'];
    $telefone = $_POST['telefone_paciente'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];

    // Prepara a consulta SQL para inserir os dados na tabela 'paciente'
    $sql = "INSERT INTO paciente (nome,idade, CPF, telefone, sexo) 
            VALUES ('$nome','$idade', '$cpf', '$telefone','$sexo')";

    // Executa a consulta
    if (mysqli_query($conn, $sql)) {
        echo "Paciente cadastrado com sucesso!";
        // Você pode redirecionar para outra página, como a lista de pacientes, ou de volta para o formulário
        // header("Location: lista_pacientes.php"); // Por exemplo
    } else {
        echo "Erro ao cadastrar paciente: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
<a href="../pages2/Cpf.php" class="button-link">Voltar</a>

</body>
</html>