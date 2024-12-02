<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Cadastro de Médico</title>
</head>
<body>
    <h1>CADASTRO DE MÉDICO</h1>
    <div class="form-container">
        <form method="POST" action="../Cadastra.php/medico.php">
            <table>
                <tr>
                    <td><label for="nome_medico">Nome:</label></td>
                    <td><input type="text" id="nome_medico" name="nome_medico" required></td>
                </tr>
                <tr>  
                    <td><label for="cpf_medico">CPF:</label></td>
                    <td><input type="text" id="cpf_medico" name="cpf_medico" required></td>
                </tr>
                <tr>
                    <td><label for="telefone_medico">Telefone:</label></td>
                    <td><input type="text" id="telefone_medico" name="telefone_medico" required></td>
                </tr>
                <tr>
                    <td><label for="email_medico">Email:</label></td>
                    <td><input type="email" id="email_medico" name="email_medico" required></td>
                </tr>

            </table>
            <div class="button-container">
                <input type="submit" value="Cadastrar" class="button-link">
                <input type="reset" value="Limpar" class="button-link">
                <a href="../pages/index.html" class="button-link">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
