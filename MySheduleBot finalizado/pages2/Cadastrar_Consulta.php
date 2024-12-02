<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Cadastro de Consulta de Paciente</title>
</head>
<body>
    <h1>Agende sua consulta</h1>
    <div class="form-container">
        <form method="POST" action="../pages2/cadastraConsulta.php">
            <table>
                <tr>
                    <td><label for="paciente">Paciente:</label></td>
                    <td>
                        <input type="text" id="paciente" name="paciente_nome" 
                            value="<?php echo isset($_GET['nome_paciente']) ? $_GET['nome_paciente'] : ''; ?>" 
                            readonly>
                        <input type="hidden" name="paciente_id" 
                            value="<?php echo isset($_GET['id_paciente']) ? $_GET['id_paciente'] : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="Data">Dia e Hora da consulta:</label></td>
                    <td>
                        <select id="Data" name="Data" required>
                            <?php
                            require("../conecta.php");

                            // Consulta para datas e horários disponíveis
                            $dados_select = mysqli_query($conn, "
                                SELECT id_data, dia, hora 
                                FROM datas 
                                WHERE WEEKDAY(dia) BETWEEN 0 AND 4 -- Segunda a sexta
                                  AND TIME(hora) BETWEEN '08:00:00' AND '18:00:00' -- Horário entre 8:00 e 18:00
                                  AND id_data NOT IN (SELECT datas FROM consulta_cadastrada) -- Exclui horários ocupados
                                ORDER BY dia, hora
                            ");

                            // Array para tradução dos dias da semana
                            $dias_da_semana = [
                                'Sunday' => 'Domingo',
                                'Monday' => 'Segunda-feira',
                                'Tuesday' => 'Terça-feira',
                                'Wednesday' => 'Quarta-feira',
                                'Thursday' => 'Quinta-feira',
                                'Friday' => 'Sexta-feira',
                                'Saturday' => 'Sábado',
                            ];

                            // Exibição das opções
                            while ($dado = mysqli_fetch_array($dados_select)) {
                                $dia_semana = $dias_da_semana[date('l', strtotime($dado['dia']))];
                                $data_formatada = date('d/m/Y', strtotime($dado['dia'])); // Formato DD/MM/YYYY
                                $hora_formatada = date('H:i', strtotime($dado['hora'])); // Formato HH:MM

                                echo '<option value="' . $dado['id_data'] . '">' . $dia_semana . ', ' . $data_formatada . ' às ' . $hora_formatada . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="tipo_consulta">Tipo de Consulta:</label></td>
                    <td>
                        <select id="tipo_consulta" name="tipo_consulta" required>
                            <?php
                            require("../conecta.php");
                            $dados_select = mysqli_query($conn, "SELECT id_consulta, Tipo_consulta FROM consultas");
                            while ($dado = mysqli_fetch_array($dados_select)) {
                                echo '<option value="' . $dado['id_consulta'] . '">' . $dado['Tipo_consulta'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="descricao">Descrição:</label></td>
                    <td><textarea id="descricao" name="descricao"></textarea></td>
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
