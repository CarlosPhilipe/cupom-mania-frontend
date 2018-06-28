
<?php
session_start();

$promocoes = $_SESSION['msg'];//Helper::sendGetRequest('promocao');
$_SESSION['msg'] = null;
?>
<h1>Promoções</h1>
<a class="btn btn-primary" href="src/controller/PromocaoController.php?controller=promocao&action=create" role="button">Nova Promoção</a>
<hr>
<div class="row promo:item">
  <div class="col-sm-3">Título</div>
  <div class="col-sm-3">
    Imagem Promoção
  </div>
  <div class="col-sm-2">Valor</div>
  <div class="col-sm-1">Quantidade</div>
  <div class="col-sm-3">
    Ações
  </div>
</div>
<?php foreach ($promocoes as $key => $value): ?>
  <div class="row promo:item">
    <div class="col-sm-3"><?php echo ($value['titulo']) ?></div>
    <div class="col-sm-3">
      <a class="btn btn-default" href='src/controller/PromocaoController.php?controller=promocao&action=view&id=<?php echo ($value['idpromocao']) ?>'>
        <img src='<?php echo ($value['imagem_campanha']) ?>' class="img-responsive img-rounded" alt="Responsive image">
      </a>
    </div>
    <div class="col-sm-2">R$ <?php echo ($value['valor']) ?></div>
    <div class="col-sm-1">R$ <?php echo ($value['quantidade']) ?></div>
    <div class="col-sm-3">
      <a class="btn btn-primary" href="src/controller/CupomController.php?controller=cupom&action=alterar&id=<?php echo ($value['idpromocao']) ?>" role="button">Alterar</a>
      <a class="btn btn-danger" href="src/controller/CupomController.php?controller=cupom&action=create&id=<?php echo ($value['idpromocao']) ?>" role="button">Excluir</a>
    </div>
  </div>
<?php endforeach; ?>
