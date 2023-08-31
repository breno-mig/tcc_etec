<?php
$erros = [];
if($_POST){
    $controle = new Controle($conn);

    $tipo = !empty($_POST['tipo']) ? $_POST['tipo'] : false;
    $preco = !empty($_POST['preco']) ? $_POST['preco'] : false;

    if(false === $tipo){
        $erros[] = "Informe o tipo do vidro!";
    }
    if(false === $preco){
        $erros[] = "Informe o preco do vidro!";
    }

    if(count($erros) == 0) {
        $controle = new Controle($conn);

        $produto = new Produto();
        $produto->setTipo($tipo)
            ->setPreco($preco);
        
        $sucesso = $controle->cadastrar($produto);

        if($sucesso<>false){
            header("location:?pagina=listar");
        }
    }
}

?>
<h2 class="display-4">Cadastro de produto</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php if(count($erros) > 0):?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($erros as $erro): ?>
                        <li><?php echo $erro ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;?>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo isset($tipo) ? $tipo : ""?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="preco">Preço</label>
                    <input type="text" name="preco" id="preco" class="form-control" value="<?php echo isset($preco) ? $preco : ""?>">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success float-right">Cadastrar</button>
        </form>
    </div>
</div>