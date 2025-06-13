<?php
require_once("modelo/Musica.php");
require_once("util/Conexao.php");

$con = Conexao::getConexao();
$sql = "SELECT * FROM Musica";
$stm = $con->prepare($sql);
$stm->execute();
$musicas = $stm->fetchAll();

foreach ($musicas as $m) {
    $musica = new Musica();
    $musica->setTitulo("Título da música: " . $m['titulo']);
    $musica->setArtista("O artista é: " . $m['artista']);
    $musica->setAlbum("O nome do álbum é: " . $m['album']);
    $musica->setGenero($m['genero']);
    $musica->setDataLancamento("Lançou no dia: " . $m['data_lancamento']);
    $musica->setDuracao("Duração de: " . $m['duracao']);
    $musica->setUrl("URL: " . $m['url']);

    $musica->getCard();
}
?>
<a href="index.php">Voltar para página principal</a>