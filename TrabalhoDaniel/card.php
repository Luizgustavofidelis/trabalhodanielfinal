<?php
require_once("modelo/Musica.php");
require_once("util/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Músicas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
            color: #f8f9fa;
        }
        .card-subtitle {
            color: #adb5bd !important;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Músicas</h1>
        <div class="row">

        <?php
        $con = Conexao::getConexao();
        $sql = "SELECT * FROM Musica";
        $stm = $con->prepare($sql);
        $stm->execute();
        $musicas = $stm->fetchAll();

        foreach ($musicas as $m) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card h-100">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $m['titulo'] . '</h5>';
            echo '<h6 class="card-subtitle mb-2 text-muted">' . $m['artista'] . '</h6>';
            echo '<p class="card-text">';
            echo '<strong>Álbum:</strong> ' . $m['album'] . '<br>';
            echo '<strong>Gênero:</strong> ' . $m['genero'] . '<br>';
            echo '<strong>Lançamento:</strong> ' . $m['data_lancamento'] . '<br>';
            echo '<strong>Duração:</strong> ' . $m['duracao'] . '<br>';
            echo '</p>';
            echo '<a href="' . $m['url'] . '" class="btn btn-primary" target="_blank"><i class="bi bi-play-fill"></i> Ouvir</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        </div>
        <div class="text-center mt-4 mb-5">
            <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>