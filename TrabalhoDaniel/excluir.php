<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    require_once("util/Conexao.php");
    
    $con = Conexao::getConexao();
    //print_r($con);
    
    //Buscar os livros já salvos na base de dados
    $sql = "DELETE FROM Musica WHERE id = ?";
    $stm = $con->prepare($sql);
    $stm->execute([$_GET["excluir"]]);
    $musicas = $stm->fetchAll();

    header("location: index.php");
?>