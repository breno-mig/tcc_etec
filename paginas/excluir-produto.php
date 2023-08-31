<?php
    $id = $_GET['id'];
    $controle = new Controle($conn);
    $produtos = $controle->pegarProdutoPorId($id);

    if ($_POST) {
        $controle = new Controle($conn);
        $sucesso = $controle->excluir($id);

        if($sucesso){
            header("location:?pagina=listar");
        }
    }
?>
<h2 class="display-4">Exclusão de Produto</h2>
<h4 class="text-danger"><?php echo $produtos->getTipo()?></h4>
<hr>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <button type="submit" class="btn-danger btn-lg">Excluir</button>
            <a href="?pagina=listar" class="btn-secondary btn-lg">Cancelar</a>
        </form>
    </div>
</div>