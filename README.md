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

<?xml version="1.0"?>
<!--
Arquivo XML contendo informações sobre os signos do zodíaco.
Cada signo possui uma data de início e fim, nome e descrição.
-->
<signos>
    <signo>
        <dataInicio>21/03</dataInicio>
        <dataFim>20/04</dataFim>
        <signoNome>Áries</signoNome>
        <descricao>É o primeiro do zodíaco e marca o início do ano astrológico. Signo cardinal, do elemento fogo e regido por Marte, fala sobre inícios, impulsividade, pioneirismo e coragem de saltar no desconhecido....
        Tem como palavras-chave empreendedorismo, dinamismo, competitividade, instinto, rapidez e agilidade. Seus nativos possuem autonomia, liderança, independência e assertividade, além de sempre agirem com honestidade e franqueza.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola.</descricao>
    </signo>
    <signo>
        <dataInicio>21/04</dataInicio>
        <dataFim>20/05</dataFim>
        <signoNome>Touro</signoNome>
        <descricao>É o segundo signo do zodíaco e fala sobre dar continuidade ao que foi iniciado com Áries. Signo fixo, pertencente ao elemento terra e regido por Vênus, Touro simboliza a praticidade, o pensamento realista, a materialidade e a persistência. Além de serem constantes, seus nativos possuem firmeza de propósito e apreciam os prazeres, o conforto, a beleza e a sensualidade.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
    <signo>
        <dataInicio>21/05</dataInicio>
        <dataFim>20/06</dataFim>
        <signoNome>Gêmeos</signoNome>
        <descricao>Signo mutável, pertencente ao elemento ar e regido por Mercúrio, Gêmeos simboliza a curiosidade e a comunicação. É marcado pela grande variedade de interesses, pela sociabilidade, pela lógica, pela adaptabilidade e pela versatilidade. Seus nativos são capazes de mudar de um tema para outro facilmente, graças à sua habilidade de lidar com muitas coisas ao mesmo tempo. São dinâmicos, possuem rápido raciocínio e sempre buscam novidades. No entanto, a inconstância também é uma característica bem marcante.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola.</descricao>
    </signo>
    <signo>
        <dataInicio>21/06</dataInicio>
        <dataFim>22/07</dataFim>
        <signoNome>Câncer</signoNome>
        <descricao>Regido pela Lua, Câncer é um signo cardinal do elemento água, características que trazem muita sensibilidade. É marcado pela habilidade de criar conexões e laços emocionais, pela forte intuição, pela empatia, pela boa memória e pela ligação com o passado. Afinal, seu astro regente representa a origem de nossas emoções. Seus nativos possuem a capacidade de perceber e sentir o ambiente. Suas palavras-chave são proteção, carinho, acolhimento, cuidado e pertencimento.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
    <signo>
        <dataInicio>23/07</dataInicio>
        <dataFim>22/08</dataFim>
        <signoNome>Leão</signoNome>
        <descricao>Signo fixo, do elemento fogo e regido pelo Sol, Leão é associado à capacidade de liderar, de marcar presença e de brilhar. É um signo marcado pelo entusiasmo, pelo otimismo e pela grande generosidade. Por outro lado, características como orgulho, vaidade e excesso de autoconfiança também podem se fazer presentes. No entanto, seus nativos possuem habilidades artísticas e teatrais, parte pela necessidade de serem reconhecidos e aplaudidos pelo que fazem.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
    <signo>
        <dataInicio>23/08</dataInicio>
        <dataFim>22/09</dataFim>
        <signoNome>Virgem</signoNome>
        <descricao>Signo mutável do elemento terra, Virgem também é regido por Mercúrio. Sua praticidade, eficiência e capacidade de notar os minuciosos detalhes são notáveis. Além disso, é um signo marcado pela boa capacidade analítica, pela racionalidade e pelo perfeccionismo. Virgem é simples, humilde e aprecia quando se sente útil e prestativo. É ótimo, inclusive, na hora de estabelecer prioridades. No entanto, pode ser bastante exigente para que as coisas saiam conforme o planejado....
         - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
    <signo>
        <dataInicio>23/09</dataInicio>
        <dataFim>22/10</dataFim>
        <signoNome>Libra</signoNome>
        <descricao>Signo cardinal do elemento ar e regido por Vênus, Libra é voltado para a sociabilidade, as parcerias e o cultivo de diversas amizades, contatos e grupos. É um signo marcado pelo interesse no comportamento humano, pela suavidade, pela diplomacia e pela cordialidade. Além de muito simpáticos, seus nativos possuem elevado senso de justiça e habilidade de ouvir outras opiniões e ideias. O bom senso estético e artístico, a harmonia, a beleza e o charme também marcam o signo graças ao seu astro regente.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola.</descricao>
    </signo>
    <signo>
        <dataInicio>23/10</dataInicio>
        <dataFim>21/11</dataFim>
        <signoNome>Escorpião</signoNome>
        <descricao>Signo fixo do elemento água, Escorpião é marcado pela intensidade e profundidade das emoções. Regido por Marte, também é associado à introspecção, à capacidade de observação, à forte intuição e sensibilidade. Nativos deste signo tendem a reter mágoas e guardar suas emoções. Ao mesmo tempo, sua capacidade de se regenerar, de se transformar e de se curar é impressionante. Esse signo é relacionado aos segredos e ao oculto, por isso costuma passar um ar de mistério e magnetismo. Suas palavras-chave são cautela, estratégia, desconfiança, profundidade e extremismo.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola.</descricao>
    </signo>
    <signo>
        <dataInicio>22/11</dataInicio>
        <dataFim>21/12</dataFim>
        <signoNome>Sagitário</signoNome>
        <descricao>Signo mutável e regido por Júpiter, Sagitário é aventureiro e explorador. De elemento fogo, se motiva pela busca de conhecimento e sabedoria, além de adorar descobrir coisas e experiências novas. Possui grande interesse em assuntos religiosos, esotéricos e filosóficos, além do gosto por viagens e por conhecer diferentes costumes e culturas. Por ser um signo filosófico, seus objetivos sempre precisam ter algo maior por trás, como um propósito. São palavras-chave do signo: otimismo, alegria, expansão, idealismo, liberdade, sinceridade e justiça.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
    <signo>
        <dataInicio>22/12</dataInicio>
        <dataFim>19/01</dataFim>
        <signoNome>Capricórnio</signoNome>
        <descricao>Signo cardinal do elemento terra e regido por Saturno, Capricórnio é marcado pela seriedade e pela responsabilidade. Seus nativos buscam ser respeitados pelo que fizeram ou construíram. Possuem grande capacidade de foco, senso de dever e potência de realização. Capricórnio possui uma visão realista e madura, é persistente, resistente e sabe que as coisas precisam de tempo e esforço para acontecerem. Tem como palavras-chave praticidade, ambição, determinação, disciplina, persistência e resistência....
         - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola.</descricao>
    </signo>
    <signo>
        <dataInicio>20/01</dataInicio>
        <dataFim>18/02</dataFim>
        <signoNome>Aquário</signoNome>
        <descricao>Regido por Saturno, Aquário pertence ao elemento ar e à qualidade fixa. É caracterizado pela originalidade, pela independência, pela criatividade, pela sociabilidade e pela racionalidade. É excêntrico, busca ter um olhar diferente e consegue pensar fora da caixa, criando teorias para lá de originais. É associado à aceitação das diferenças, ao pensar no coletivo, ao questionamento, à rebeldia e ao ato de contestar. No entanto, pode ser bastante rigoroso ao formar suas opiniões. Não costuma mudar de ideia facilmente, já que é exigente consigo mesmo na hora de criar suas teorias....
         - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
    <signo>
        <dataInicio>19/02</dataInicio>
        <dataFim>20/03</dataFim>
        <signoNome>Peixes</signoNome>
        <descricao>Signo mutável do elemento água, Peixes é regido por Júpiter e marcado pela sensibilidade. Suas principais características são a empatia, a receptividade e o altruísmo. É um signo com muita capacidade de se adaptar a diversos ambientes e pessoas, bem como de se sensibilizar com a dor do outro. Peixes é muito intuitivo e, por isso, é associado ao misticismo, à espiritualidade e aos sonhos. Além disso, a criatividade é marca registrada dos nativos piscianos, que gostam de se expressar através da arte e sonham alto.... 
        - Veja mais em https://www.uol.com.br/universa/horoscopo/noticias/redacao/2022/11/06/caracteristicas-dos-signos.htm?cmpid=copiaecola</descricao>
    </signo>
</signos>

<!--
Meta tags básicas para configurar a codificação de caracteres e a responsividade da página.
Título da página e links para os arquivos CSS do Bootstrap e do estilo personalizado.
-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verifique seu Signo</title>

<!-- Link para o CSS do Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Link para o CSS personalizado -->
<link rel="stylesheet" href="assets/css/style.css">

Crie um Readme para o git hum na linguagem markdow
