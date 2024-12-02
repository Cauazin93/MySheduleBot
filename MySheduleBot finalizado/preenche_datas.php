<?php
require("./conecta.php");

// Configurações de intervalo de datas e horários
$data_inicial = '2024-12-02'; // Data inicial (segunda-feira)
$data_final = '2024-12-31';   // Data final
$horario_inicial = '08:00:00';
$horario_final = '18:00:00';
$intervalo_minutos = 30;

// Loop para gerar datas e horários
$current_date = $data_inicial;

while (strtotime($current_date) <= strtotime($data_final)) {
    // Verifica se é um dia útil (segunda a sexta)
    $dia_semana = date('N', strtotime($current_date)); // 1 = segunda, 5 = sexta
    if ($dia_semana >= 1 && $dia_semana <= 5) {
        $current_time = $horario_inicial;
        while (strtotime($current_time) < strtotime($horario_final)) {
            // Insere no banco de dados
            $sql = "INSERT INTO datas (dia, hora) VALUES ('$current_date', '$current_time')";
            mysqli_query($conn, $sql);

            // Incrementa o horário
            $current_time = date('H:i:s', strtotime("+$intervalo_minutos minutes", strtotime($current_time)));
        }
    }
    // Incrementa o dia
    $current_date = date('Y-m-d', strtotime("+1 day", strtotime($current_date)));
}

echo "Datas e horários populados com sucesso!";
?>
