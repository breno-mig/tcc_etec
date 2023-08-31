<?php
    $id = $_GET['id'];
    $controle = new Controle($conn);
    $produtos = $controle->pegarProdutoPorId($id);

    if ($_POST) {
        $tipo = !empty($_POST['tipo']) ? $_POST['tipo'] : false;
        $preco = !empty($_POST['preco']) ? $_POST['preco'] : false;
        
        $prod = new Produto();
        $prod->setTipo($tipo)
            ->setPreco($preco)
            ->setId($id);

        $sucesso = $controle->editar($prod);
        if($sucesso){
            header("location:?pagina=listar");
        }
    }
?>
<h2 class="display-4">Edição de Produto</h2>
<h4 class="text-danger"><?php echo $produtos->getTipo()?></h4>
<hr>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $produtos->getTipo()?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="preco">Preço</label>
                    <input type="text" name="preco" id="preco" class="form-control" value="<?php echo $produtos->getPreco()?>">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success float-right">Salvar</button>
        </form>
    </div>
</div>