<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Veiculo
 *
 * @author ademar.perfoll
 */
class Veiculo {
    //put your code here
    private $id;
    private $descricao;
    private $marca;
    private $preco;
    private $imagem;
    private $destaque;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getMarca() {
        return $this->marca;
    }

    function getPreco() {
        return $this->preco;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    
    function getDestaque() {
        return $this->destaque;
    }

    function setDestaque($destaque) {
        $this->destaque = $destaque;
    }




}
