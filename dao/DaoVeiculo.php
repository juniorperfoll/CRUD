<?php

require_once 'Conexao.php';
require_once 'model/Veiculo.php';

class DaoVeiculo {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoVeiculo();
        return self::$instance;
    }

    public function inserir(Veiculo $veiculo) {
        try {
            $sql = "INSERT INTO veiculo "
                    . " (descricao,"
                    . " marca_id,"
                    . " preco,"
                    . " imagem,"
                    . " destaque) "
                    . " VALUES "
                    . " (:descricao,"
                    . " :marca_id,"
                    . " :preco,"
                    . " :imagem,"
                    . " :destaque)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $veiculo->getDescricao());
            $p_sql->bindValue(":marca_id", $veiculo->getMarca());
            $p_sql->bindValue(":preco", $veiculo->getPreco());
            $p_sql->bindValue(":imagem", $veiculo->getImagem());
            $p_sql->bindValue(":destaque", $veiculo->getDestaque());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT veiculo.id,"
                . " veiculo.descricao,"
                . " veiculo.preco,"
                . " veiculo.destaque,"
                . " veiculo.imagem,"
                . " marca.descricao as marca"
                . " FROM veiculo, marca"
                . " WHERE veiculo.marca_id = marca.id "
                . " ORDER BY veiculo.descricao";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM veiculo WHERE id =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getVeiculo($id) {
        $sql = "SELECT * FROM veiculo WHERE id=:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getLogin($login,$senha) {
        $sql = "SELECT * FROM veiculo WHERE login=:login and senha=:senha";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":login", $login);
        $p_sql->bindValue(":senha", $senha);
        $p_sql->execute();
        return $p_sql->rowCount();
    }

    public function atualizar(Veiculo $veiculo) {
        try {
            $sql = "UPDATE veiculo set descricao =:descricao, preco=:preco, marca_id=:marca,imagem=:imagem,destaque=:destaque"
                    . " WHERE id=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $veiculo->getId());
            $p_sql->bindValue(":descricao", $veiculo->getDescricao());
            $p_sql->bindValue(":preco", $veiculo->getPreco());
            $p_sql->bindValue(":marca", $veiculo->getMarca());
            $p_sql->bindValue(":imagem", $veiculo->getImagem());
            $p_sql->bindValue(":destaque", $veiculo->getDestaque());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
