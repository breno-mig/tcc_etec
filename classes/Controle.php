<?php
class Controle
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    
    public function preencheProduto($prod)
    {
        $produto = new Produto();
        $produto->setId($prod->id)
            ->setTipo($prod->tipo)
            ->setPreco($prod->preco);
        return $produto;
    }


    public function listar()
    {
        $sql = "select * from produtos";

        $smtm = $this->conn->query($sql);

        $retorno = [];
        while($row =  $smtm->fetchObject()){
            $retorno[] = $this->preencheProduto($row);
        }
        return $retorno;
    }

    public function pegarProdutoPorId(int $id)
    {
        $sql = "select * from produtos where id = :id";
        $smtm = $this->conn->prepare($sql);
        $smtm->bindValue(":id", $id);
        if($smtm ->execute()){
            $row = $smtm->fetchObject();
            return $this->preencheProduto($row);
        }
        return new Produto();
    }


    public function cadastrar(Produto $produtos)
    {
        $sql = "insert into produtos (tipo, preco) values (:tipo, :preco);";
        $smtm = $this->conn->prepare($sql);
        $smtm->bindValue(':tipo', $produtos->getTipo());
        $smtm->bindValue(':preco', $produtos->getPreco());
        return $smtm->execute();
    }
    
    public function editar(Produto $produtos)
    {
        $sql = "update produtos set tipo = :tipo, preco = :preco where id = :id";
        $smtm = $this->conn->prepare($sql);
        $smtm->bindValue(':tipo', $produtos->getTipo());
        $smtm->bindValue(':preco', $produtos->getPreco());
        $smtm->bindValue(':id', $produtos->getId());
        return $smtm->execute();
    }

    public function excluir(int $id)
    {
        $sql = "delete from produtos where id = :id";
        $smtm = $this->conn->prepare($sql);
        $smtm->bindValue(':id', $id);
        return $smtm->execute();
    }
   
}
?>