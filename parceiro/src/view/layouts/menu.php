<?php
require(__dir__."/../../environment.php");
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo NAME_APP ?> - <?php echo $_SESSION['estabelecimento']['nome']; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="src/controller/PromocaoController.php?controller=promocao&action=list">Promoções <span class="sr-only">(current)</span></a></li>
        <?php if (isset($_SESSION['estabelecimento'])): ?>
          <li ><a href="#">Validar Cupom</a></li>
          <li ><a href="src/controller/EstabelecimentoController.php?controller=user&action=logout">Sair</a></li>
        <?php endif; ?>
      </ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
