<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Inclui o cabeçalho padrão e os links para o CSS -->
    <?php include('layouts/header.php'); ?>
</head>
<body>
    <div class="container">
        <h1>Verifique seu Signo</h1>
        <!-- Formulário para coletar a data de nascimento do usuário -->
        <form id="signo-form" method="POST" action="show_zodiac_sign.php">
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>