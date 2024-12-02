<?php
require("../conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];

    // Consulta para verificar se o CPF existe
    $query = "SELECT id_paciente, Nome FROM paciente WHERE CPF = '$cpf'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // CPF encontrado
        $row = mysqli_fetch_assoc($result);
        $id_paciente = $row['id_paciente'];
        $nome_paciente = $row['Nome'];

        // Redireciona para a página de cadastro de consulta com os dados do paciente
        header("Location: Cadastrar_Consulta.php?id_paciente=$id_paciente&nome_paciente=" . urlencode($nome_paciente));
        exit;
    } else {
        // CPF não encontrado, redireciona para cadastro de paciente
        header("Location: Cadastrar_paciente.php?cpf=" . urlencode($cpf));
        exit;
    }
}
?>
