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
    $nome = $_POST['nome_medico'];
    $cpf = $_POST['cpf_medico'];
    $telefone = $_POST['telefone_medico'];
    $email = $_POST['email_medico'];

    // Prepara a consulta SQL para inserir os dados na tabela 'medico'
    $sql = "INSERT INTO medico (nome, CPF, telefone, email) 
            VALUES ('$nome', '$cpf', '$telefone', '$email')";

    // Executa a consulta
    if (mysqli_query($conn, $sql)) {
        echo "Médico cadastrado com sucesso!";
        // Você pode redirecionar para outra página, como a lista de médicos, ou de volta para o formulário
        // header("Location: lista_medicos.php"); // Por exemplo
    } else {
        echo "Erro ao cadastrar médico: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
<a href="../pages/index.html" class="button-link">Voltar</a>
</body>
</html>