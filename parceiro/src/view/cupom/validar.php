
<?php
session_start();

$cupom = $_SESSION['msg'];
// print_r($value);
?>


<h2/>Código promocional:</h2>
<form action="src/controller/CupomController.php?controller=cupom&action=validarPost" method="POST">
  <div class="form-group">
    <label for="codigo">Código do cupom</label>
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="xxxxxxx">
    <?php if ($cupom): ?>

      <h2><?php echo $cupom->mensagem;?></h2>
    <?php endif; ?>
  </div>


  <button type="submit" class="btn btn-default">Entrar</button>
</form>
