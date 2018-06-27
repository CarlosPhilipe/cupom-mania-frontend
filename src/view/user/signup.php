<a class="btn btn-primary" href="src/controller/UserController.php?controller=user&action=login">Logar</a>
<h2/>Cadastrar</h2>
<form action="src/controller/UserController.php?controller=user&action=postsignup" method="POST">
  <div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="nome" class="form-control" id="inputNome" name="inputNome" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="inputPassword">Senha</label>
    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Senha">
  </div>
  <button type="submit" class="btn btn-default">Cadastrar</button>

</form>
