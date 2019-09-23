<?php
require_once 'global.php';

try {
    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->carregarProdutos();
    $lista_produtos = $categoria->produtos;
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $categoria->id ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria->nome ?></dd>
    <dt>Produtos</dt>
    <?php if (count($lista_produtos) > 0): ?>
        <dd>
            <ul>
                <?php foreach ($lista_produtos as $produto): ?>
                    <li>
                        <a href="/produtos-editar.php?id=<?php echo $produto['id'] ?>"><?php echo $produto['nome'] ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </dd>
    <?php else: ?>
        <dd>Não existem produtos para esta categoria</dd>
    <?php endif ?>
</dl>
<?php require_once 'rodape.php' ?>
