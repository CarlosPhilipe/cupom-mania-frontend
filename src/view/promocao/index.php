
<?php
require(__dir__."/../../model/Helper.php");

$promocoes = Helper::sendGetRequest('promocao');
?>
<?php foreach ($promocoes as $key => $value): ?>
  <div class="row promo:item">
  <div class="col-sm-12"><h1><?php echo ($value['titulo']) ?></h1></div>
  <div class="col-sm-12">
    <img src='<?php echo ($value['imagem_campanha']) ?>' class="img-responsive" alt="Responsive image">
  </div>
  </div>
<?php endforeach; ?>
