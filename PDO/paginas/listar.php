<?php
    $controle = new Controle($conn);
    $produtos = $controle->listar();
?>

<h2 class="display-3">Listagem de produtos</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <a href="?pagina=cadastrar-produto" class="btn btn-primary float-right">Novo Produto</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($produtos as $produto): ?>
                <tr>
                    <td><?php echo $produto->getTipo();?></td>
                    <td><?php echo $produto->getPreco();?></td>
                    <td>
                        <a class="btn btn-success" href="?pagina=editar-produto&id=<?php echo $produto->getId();?>">Editar</a>
                        <a class="btn btn-danger" href="?pagina=excluir-produto&id=<?php echo $produto->getId();?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
