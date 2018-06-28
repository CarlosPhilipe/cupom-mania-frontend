
<?php
session_start();

$promocoes = $_SESSION['msg'];//Helper::sendGetRequest('promocao');
$_SESSION['msg'] = null;
?>
<?php foreach ($promocoes as $key => $value): ?>
  <div class="row promo:item">
    <div class="col-sm-12"><h1><?php echo ($value['titulo']) ?></h1></div>
    <div class="col-sm-12">
      <a class="btn btn-default" href='src/controller/PromocaoController.php?controller=promocao&action=view&id=<?php echo ($value['idpromocao']) ?>'>
        <img src='<?php echo ($value['imagem_campanha']) ?>' class="img-responsive img-rounded" alt="Responsive image">
      </a>
    </div>
    <div class="col-sm-12"><h2>R$ <?php echo ($value['valor']) ?></h2></div>
  </div>
<?php endforeach; ?>
