<?php

class Controle
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function listar()
    {
        $sql = "select * from produtos";

        $smtm = $this->conn->query($sql);

        $retorno = [];
        while($row = $smtm->fetch(PDO::FETCH_OBJ())){
            $retorno[] = $this->preencheProduto($row);
        }
        return $retorno;
    }

    public function cadastrar(Produto $produtos)
    {
        $sql = "insert into produtos (nome, preco) values (:nome, :preco);";
        $smtm = $this->conn->prepare($sql);
        $smtm->bindValue(':nome', $produto->getNome());
        $smtm->bindValue(':preco', $produto->getPreco());
        return $smtm->execute();
    }
    
    public function preencheProduto($prod)
    {
        $produto = new Produto();
        $produto->setId($prod->id)
            ->setNome($prod->nome)
            ->setDescricao($prod->descricao)
            ->setPreco($prod->preco);
        return $produto;
    }
}