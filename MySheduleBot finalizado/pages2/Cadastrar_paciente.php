<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Cadastro de Paciente</title>
</head>
<body>
    <h3>Seu CPF não esta na nossa clinica</h3>
    <h1>Faça seu cadastro para nos ajudar:</h1>
    <div class="form-container">
        <form method="POST" action="../pages2/CadastraPaciente.php">
            <table>
                <tr>
                    <td><label for="nome_paciente">Nome:</label></td>
                    <td><input type="text" id="nome_paciente" name="nome_paciente" required></td>
                </tr>
                <tr>  
                    <td><label for="cpf_paciente">CPF:</label></td>
                    <td><input type="text" id="cpf_paciente" name="cpf_paciente" required></td>
                </tr>
                <tr>
                    <td><label for="idade">Idade:</label></td>
                    <td><input type="number" id="idade" name="idade" required></td>
                </tr>
                <tr>
                    <td><label for="telefone_paciente">Telefone:</label></td>
                    <td><input type="text" id="telefone_paciente" name="telefone_paciente" required></td>
                </tr>
                <tr>
                    <td><label for="sexo">Tipo de Consulta:</label></td>
                    <td>
                        <select id="sexo" name="sexo" required>
                            <?php
                                require("../conecta.php");

                                // Executando a consulta SQL para obter os tipos de consulta
                                $dados_select = mysqli_query($conn, "SELECT id_sexo, nome_sexo FROM sexo");

                                // Gerando as opções dentro do select
                                while ($dado = mysqli_fetch_array($dados_select)) {
                                    echo '<option value="' . $dado[0] . '">' . $dado[1] . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="button-container">
                <input type="submit" value="Cadastrar" class="button-link">
                <input type="reset" value="Limpar" class="button-link">
                 
            </div>
        </form>
    </div>
</body>
</html>
