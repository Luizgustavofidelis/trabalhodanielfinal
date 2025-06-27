<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/Conexao.php");

$con = Conexao::getConexao();


$titulo = $artista = $tipo_lancamento = $genero = $datlancamento = $duracao = $url = '';
$errorMessages = [
    'titulo' => '',
    'artista' => '',
    'tipo_lancamento' => '',
    'genero' => '',
    'data_lancamento' => '',
    'duracao' => '',
    'url' => ''
];

$sql = "SELECT * FROM Musica";
$stm = $con->prepare($sql);
$stm->execute();
$musicas = $stm->fetchAll();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST["titulo"] ?? '');
    $artista = trim($_POST["artista"] ?? '');
    $tipo_lancamento = trim($_POST["tipo_lancamento"] ?? '');
    $genero = trim($_POST["genero"] ?? '');
    $datlancamento = trim($_POST["data_lancamento"] ?? '');
    $duracao = trim($_POST["duracao"] ?? '');
    $url = trim($_POST["url"] ?? '');


    if (empty($titulo)) {
        $errorMessages['titulo'] = 'Informe o título.';
    }
    if (empty($artista)) {
        $errorMessages['artista'] = 'Informe o artista.';
    }
    if (empty($tipo_lancamento)) {
        $errorMessages['tipo_lancamento'] = 'Informe o tipo de lançamento.';
    }
    if (empty($genero)) {
        $errorMessages['genero'] = 'Informe o gênero.';
    }
    if (empty($datlancamento)) {
        $errorMessages['data_lancamento'] = 'Informe a data de lançamento.';
    }
    if (empty($duracao)) {
        $errorMessages['duracao'] = 'Informe a duração.';
    }
    if (empty($url)) {
        $errorMessages['url'] = 'Informe a URL.';
    }


    $temErros = array_filter($errorMessages);


    if (empty($temErros)) {
        $sql = "INSERT INTO Musica (titulo, artista, tipo_lancamento, genero, data_lancamento, duracao, url) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stm = $con->prepare($sql);
        $stm->execute([$titulo, $artista, $tipo_lancamento, $genero, $datlancamento, $duracao, $url]);


        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="style/estilo.css">


<head>
    <meta charset="UTF-8">
    <title>Cadastrar Música</title>
</head>

<body>
    <h1>Listagem das musicas</h1>

    <table border="1">
        <tr>
            <th>titulo</th>
            <th>artista</th>
            <th>datlancamento</th>
            <th>duracao</th>
            <th>Excluir</th>
        </tr>

        <?php foreach ($musicas as $m): ?>
            <tr>

                <td><?= $m["titulo"] ?></td>
                <td><?= $m["artista"] ?></td>
                <td><?= $m["data_lancamento"] ?></td>
                <td><?= $m["duracao"] ?></td>
                <td><a href="excluir.php?excluir=<?= $m["id"] ?>">Excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h1>Cadastrar Música</h1>

    <form action="index.php" method="post">
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="<?= $titulo ?>">
        <span style="color:red"><?= $errorMessages['titulo'] ?></span>
        <br><br>

        <label for="artista">Artista:</label><br>
        <input type="text" name="artista" id="artista" value="<?= $artista ?>">
        <span style="color:red"><?= $errorMessages['artista'] ?></span>
        <br><br>

        
        <label for="tipo_lancamento">Tipo de Lançamento:</label><br>
        <select name="tipo_lancamento" id="tipo_lancamento">
            <option value="">Escolha um tipo de lançamento</option>
            <option value="single">Single</option>
            <option value="album">Álbum</option>
            <option value="ep">EP</option>
            <option value="soundtrack">Trilha Sonora</option>
            <option value="live">Ao Vivo</option>
        </select>
        <span style="color:red"><?= $errorMessages['tipo_lancamento'] ?></span>
        <br><br>



        <label for="genero">Genero:</label> <br>
        <select name="genero" id="genero">
            <option value="">Escolha um genêro</option>
            <option value="rock">Rock</option>
            <option value="rap">Rap</option>
            <option value="pop">Pop</option>
            <option value="sertanejo">Sertanejo</option>
            <option value="funk">Funk</option>
            <option value="pagode">Pagode</option>
        </select>
        <span style="color:red"><?= $errorMessages['genero'] ?></span>
        <br>

        <label for="data_lancamento">Data de Lançamento:</label><br>
        <input type="date" name="data_lancamento" id="data_lancamento" value="<?= $datlancamento ?>">
        <span style="color:red"><?= $errorMessages['data_lancamento'] ?></span>
        <br><br>

        <label for="duracao">Duração (em segundos):</label><br>
        <input type="number" name="duracao" id="duracao" value="<?= $duracao ?>">
        <span style="color:red"><?= $errorMessages['duracao'] ?></span>
        <br><br>

        <label for="url">URL:</label><br>
        <input type="url" name="url" id="url" value="<?= $url ?>">
        <span style="color:red"><?= $errorMessages['url'] ?></span>
        <br><br>

        <button type="submit">Gravar</button>
        <a href="card.php" class="botao-card">Ir para o Card</a>
    </form>
    <script src=" js/validacao.js"></script>
</body>

</html>