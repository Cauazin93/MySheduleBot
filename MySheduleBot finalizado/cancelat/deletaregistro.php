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
require_once("../conecta.php");

// Verifica se o ID da consulta foi enviado via POST
if (!empty($_POST['id_consulta'])) {
    $id_consulta = $_POST['id_consulta'];

    // Prepara a query com segurança
    $sql = "DELETE FROM consulta_cadastrada WHERE id_consulta = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Associa o parâmetro e executa
        $stmt->bind_param("i", $id_consulta);
        if ($stmt->execute()) {
            echo "<center><h1>Consulta excluida com sucesso!</h1></center>";
        } else {
            echo "<center><h3>Erro ao excluir o registro ID $id_consulta: {$stmt->error}</h3></center>";
        }
        $stmt->close();
    } else {
        echo "<center><h3>Erro ao preparar a exclusão: {$conn->error}</h3></center>";
    }
} else {
    echo "<center><h3>ID da consulta não enviado.</h3></center>";
}

?>

</body>
</html>
