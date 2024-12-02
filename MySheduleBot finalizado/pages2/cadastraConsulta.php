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
    $paciente = $_POST['paciente_id'];
    $tipo_consulta = $_POST['tipo_consulta'];
    $data = $_POST['Data'];
    $descricao = $_POST['descricao'];

    // Prepara a consulta SQL para inserir os dados na tabela 'paciente'
    $sql = "INSERT INTO consulta_cadastrada (paciente, tipo_consulta, datas, descricao) 
            VALUES ('$paciente', '$tipo_consulta', '$data','$descricao')";

    // Executa a consulta
    if (mysqli_query($conn, $sql)) {
        echo "Consulta cadastrada com sucesso!";
        // Você pode redirecionar para outra página, como a lista de pacientes, ou de volta para o formulário
        // header("Location: lista_pacientes.php"); // Por exemplo
    } else {
        echo "Erro ao cadastrar Consulta: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>

</body>
</html>