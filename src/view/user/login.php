<a class="btn btn-primary" href="src/controller/UserController.php?controller=user&action=signup">Cadastrar</a>
<h2/>Logar</h2>
<form action="src/controller/UserController.php?controller=user&action=postlogin" method="POST">
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="inputPassword">Senha</label>
    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Senha">
  </div>
  <button type="submit" class="btn btn-default">Entrar</button>
</form>
