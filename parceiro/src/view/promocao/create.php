
<h2/>Nova promoção</h2>
<form action="src/controller/PromocaoController.php?controller=promocao&action=createPost" method="POST">
  <div class="form-group">
    <label for="inputTitulo">Titulo</label>
    <input type="text" class="form-control" id="inputTitulo" name="inputTitulo" placeholder="título">
  </div>
  <div class="form-group">
    <label for="inputImagem">url imagem</label>
    <input type="text" class="form-control" id="inputImagem" name="inputImagem" placeholder="http://url-imagem.com">
  </div>
  <div class="form-group">
    <label for="inputExpirationDate">validade</label>
    <input type="text" class="form-control" id="inputExpirationDate" name="inputExpirationDate" placeholder="">
  </div>
  <div class="form-group">
    <label for="inputValue">valor</label>
    <input type="text" class="form-control" id="inputValue" name="inputValue" placeholder="">
  </div>

  <div class="form-group">
    <label for="inputNumber">quantidade</label>
    <input type="text" class="form-control" id="inputNumber" name="inputNumber" placeholder="">
  </div>
  
  <button type="submit" class="btn btn-default">Entrar</button>
</form>
