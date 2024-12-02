<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Visualizar Consultas</title>
</head>
<body>
    <div class="container">
        <h1>Consultas de <?php echo htmlspecialchars($_GET['nome_paciente']); ?></h1>
        <table class="consulta-table">
            <thead>
                <tr>
                    <th>Id Consulta</th>
                    <th>Paciente</th>
                    <th>Tipo da Consulta</th>
                    <th>Medico</th>
                    <th>Dia</th>
                    <th>Horario</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require("../conecta.php");
                    
                    // Obtém o CPF do paciente
                    $cpf = $_GET['cpf'];
                    
                    // Consulta para pegar as consultas do paciente com o CPF
                    $dados_select = mysqli_query($conn, "SELECT consulta_cadastrada.id_consulta, paciente.Nome, consultas.tipo_consulta, medico.nome, datas.dia, datas.hora, consulta_cadastrada.descricao
                        FROM consulta_cadastrada
                        INNER JOIN paciente ON paciente.id_paciente = consulta_cadastrada.paciente
                        INNER JOIN consultas ON consultas.id_consulta = consulta_cadastrada.tipo_consulta
                        INNER JOIN datas ON datas.id_data = consulta_cadastrada.datas
                        INNER JOIN medico ON medico.id_medico = consultas.medico_da_area
                        WHERE paciente.CPF = '$cpf'");

                    while($dado = mysqli_fetch_array($dados_select)) {
                        echo "<tr>";
                        echo "<td>" . $dado[0] . "</td>";
                        echo "<td>" . $dado[1] . "</td>";
                        echo "<td>" . $dado[2] . "</td>";
                        echo "<td>" . $dado[3] . "</td>";
                        $data = new DateTime($dado[4]);
                        echo '<td>' . $data->format('d/m/Y') . '</td>';
                        $data = new DateTime($dado[5]);
                        echo '<td>' . $data->format('H:i') . '</td>';
                        echo "<td>" . $dado[6] . "</td>";
                        echo '<td>
                            <form action="../cancelat/deletaregistro.php" method="post">
                                <input type="hidden" name="id_consulta" value="' . $dado['id_consulta'] . '">
                                <input type="submit" value="Excluir" class="button-link">
                            </form>
                        </td>';
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
