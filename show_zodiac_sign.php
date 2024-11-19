<?php include('layouts/header.php'); ?>

<div class="container">
    <h1>Seu Signo</h1>
    <?php
    // Obtém a data de nascimento enviada pelo usuário
    $data_nascimento = $_POST['data_nascimento'];
    
    // Carrega o arquivo XML contendo os signos
    $signos = simplexml_load_file("signos.xml");
    
    // Função para converter o formato da data
    function convertDate($date) {
        list($day, $month) = explode('/', $date);
        return $month . '-' . $day;
    }
    
    // Converte a data de nascimento para o formato mês-dia
    $birthDate = date('m-d', strtotime($data_nascimento));
    $foundSigno = null;

    // Percorre todos os signos para encontrar o correspondente
    foreach ($signos->signo as $signo) {
        $startDate = convertDate($signo->dataInicio);
        $endDate = convertDate($signo->dataFim);

        // Verifica se a data de nascimento está dentro do intervalo do signo
        if (($birthDate >= $startDate && $birthDate <= $endDate) || 
           ($startDate > $endDate && ($birthDate >= $startDate || $birthDate <= $endDate))) {
            $foundSigno = $signo;
            break;
        }
    }

    // Exibe o signo encontrado ou uma mensagem de erro
    if ($foundSigno) {
        echo "<h2>{$foundSigno->signoNome}</h2>";
        echo "<p>{$foundSigno->descricao}</p>";
    } else {
        echo "<p>Signo não encontrado.</p>";
    }
    ?>
    <!-- Link para voltar à página inicial -->
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>