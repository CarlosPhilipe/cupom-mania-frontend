<?php
session_start();

$promocao = $_SESSION['msg'];
$_SESSION['msg'] = null;
?>
<a class="btn btn-default" href="src/controller/PromocaoController.php?controller=promocao&action=list" role="button">Voltar</a>

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">

  <div class="col-sm-12"><h1><?php echo ($promocao['titulo']) ?></h1></div>
  <div class="col-sm-12"><img src='<?php echo ($promocao['imagem_campanha']) ?>' alt="..." class="img-responsive img-thumbnail img-thumbnail"></div>
  <div class="col-sm-12"><h2><?php echo ($promocao['valor']) ?></h2></div>
  <div class="col-sm-12"><a class="btn btn-danger" href="src/controller/CupomController.php?controller=cupom&action=create&id=<?php echo ($promocao['idpromocao']) ?>" role="button">Gerar Cupom</a></div>
  <div class="col-sm-12"><?php echo ($promocao['regulamento']) ?></div>
</div>
