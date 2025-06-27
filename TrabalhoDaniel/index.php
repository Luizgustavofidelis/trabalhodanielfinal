<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/Conexao.php");

$con = Conexao::getConexao();


$titulo = $artista = $album = $genero = $datlancamento = $duracao = $url = '';
$errorMessages = [
    'titulo' => '',
    'artista' => '',
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
    $album = trim($_POST["album"] ?? '');
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
        $sql = "INSERT INTO Musica (titulo, artista, album, genero, data_lancamento, duracao, url) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stm = $con->prepare($sql);
        $stm->execute([$titulo, $artista, $album, $genero, $datlancamento, $duracao, $url]);

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
            <td><?= htmlspecialchars($m["artista"]) ?></td>
            <td><?= $m["data_lancamento"] ?></td>
            <td><?= $m["duracao"] ?></td>
            <td><a href="excluir.php?excluir=<?= $m["id"] ?>">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h1>Cadastrar Música</h1>

    <form action="index.php" method="post">
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($titulo) ?>">
        <span style="color:red"><?= $errorMessages['titulo'] ?></span>
        <br><br>

        <label for="artista">Artista:</label><br>
        <input type="text" name="artista" id="artista" value="<?= htmlspecialchars($artista) ?>">
        <span style="color:red"><?= $errorMessages['artista'] ?></span>
        <br><br>

        <label for="album">Álbum:</label><br>
        <input type="text" name="album" id="album" value="<?= htmlspecialchars($album) ?>">
        <br><br>

        <label for="genero">Gênero:</label><br>
        <input type="text" name="genero" id="genero" value="<?= htmlspecialchars($genero) ?>">
        <span style="color:red"><?= $errorMessages['genero'] ?></span>
        <br><br>

        <label for="data_lancamento">Data de Lançamento:</label><br>
        <input type="date" name="data_lancamento" id="data_lancamento" value="<?= htmlspecialchars($datlancamento) ?>">
        <span style="color:red"><?= $errorMessages['data_lancamento'] ?></span>
        <br><br>

        <label for="duracao">Duração (em segundos):</label><br>
        <input type="number" name="duracao" id="duracao" value="<?= htmlspecialchars($duracao) ?>">
        <span style="color:red"><?= $errorMessages['duracao'] ?></span>
        <br><br>

        <label for="url">URL:</label><br>
        <input type="url" name="url" id="url" value="<?= htmlspecialchars($url) ?>">
        <span style="color:red"><?= $errorMessages['url'] ?></span>
        <br><br>

        <button type="submit">Gravar</button>
        <a href="card.php" class="botao-card">Ir para o Card</a>
    </form>
    <script src=" js/validacao.js"></script>
</body>

</html>