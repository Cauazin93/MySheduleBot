<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Verificação de CPF</title>
</head>
<body>
    <h1>Verificação de CPF</h1>
    <div class="form-container">
        <form method="POST" action="./verificaCPFFORMS.php">
            <label for="cpf">Digite o CPF do paciente:</label>
            <input type="text" id="cpf" name="cpf" required>
            <div class="button-container">
                <input type="submit" value="Verificar" class="button-link">
            </div>
        </form>
    </div>
</body>
</html>
