<?php
require_once("modelo/Musica.php");
require_once("util/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Músicas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
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
                $musica = new Musica();
                $musica ->setId($m['id']);
                $musica ->setTitulo($m['titulo']);
                $musica ->setArtista($m['artista']);
                $musica ->setGenero($m['genero']);
                $musica ->setTipoLancamento($m['tipo_lancamento']);
                $musica ->setDataLancamento($m['data_lancamento']);
                $musica ->setDuracao($m['duracao']);
                $musica ->setUrl($m['url']);

               
                echo '<div class="col-md-4 mb-4">';
                $musica ->getCard();
                echo '</div>';
            }
            ?>

        </div>
        <div class="text-center mt-4 mb-5">
            <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
