
<?php
require(__dir__."/../../model/Helper.php");

$promocoes = Helper::sendGetRequest('promocao');
?>
<?php foreach ($promocoes as $key => $value): ?>
  <div class="row promo:item">
  <div class="col-sm-12"><h1><?php echo ($value['titulo']) ?></h1></div>
  <div class="col-sm-12">
    <a class="btn btn-default" href='?controller=promocao&action=detalhes&promocao=<?php echo ($value['idpromocao']) ?>'>
      <img src='<?php echo ($value['imagem_campanha']) ?>' class="img-responsive img-rounded" alt="Responsive image">
    </a>
  </div>
  </div>
<?php endforeach; ?>
