<?php

$id = $_GET["id"];
require_once 'dao/DaoVeiculo.php';
$DaoVeiculo = DaoVeiculo::getInstance();
$dadosVeiculo = $DaoVeiculo->getVeiculo($id);
$exe = $DaoVeiculo->deletar($id);
if ($exe) {

    $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino . $dadosVeiculo["imagem"];
    //permissao no arquivo
    chown($arquivoDestino, 666);
    //apaga imagem atual para trocar pela nova
    unlink($arquivoDestino);

    echo "<script type='text/javascript'>"
    . " alert('Excluído com Sucesso!');"
    . "location.href='?pg=veiculos';"
    . "</script>";
} else {
    echo "<script type='text/javascript'>"
    . " alert('Não foi possível excluir!');"
    . "location.href='?pg=veiculos';"
    . "</script>";
}
