<?php
// Inclui o arquivo de conexão com o banco de dados
include('./conecta.php');

// Recebe os dados do formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Prepara a consulta para evitar SQL Injection
$sql = $conn->prepare("SELECT * FROM login WHERE usuario = ? AND senha = ?");
$sql->bind_param("ss", $usuario, $senha);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    // Login bem-sucedido
    header("Location:./pages/index.html");
    exit();
} else {
    // Login falhou
    echo "Usuário ou senha inválidos.";
}

// Fecha a conexão
$conn->close();
?>
