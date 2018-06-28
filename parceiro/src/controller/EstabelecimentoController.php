<?php
session_start();
require('Controller.php');
require(__dir__."/../model/Helper.php");
class EstabelecimentoController extends Controller {

  public function actionIndex()
  {
    $this->actionLogin();
  }

  public function actionLogin()
  {
    $_SESSION['path'] = 'estabelecimento/login.php';
    header('Location: ../../index.php?controller=estabelecimento&action=login');
  }

  public function actionLogout()
  {
    $_SESSION = null;
    $this->actionLogin();
  }

  public function actionPostLogin()
  {
    if ($_POST && !empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])) {
        $data = json_encode([
          'email' => $_POST['inputEmail'],
          'senha' => $_POST['inputPassword']
        ]);
        $msg = Helper::sendPostRequest('estabelecimento/login', $data);
        var_dump($msg);
        $msg = json_decode($msg);
        if($msg->idestabelecimento) {
          $_SESSION['estabelecimento'] = [
            'key' => $msg->chave,
            'nome' => $msg->nome,
            'email' => $msg->email,
            'id' => $msg->idestabelecimento
          ];
          header('Location: ./PromocaoController.php?controller=promocao&action=list');
        }
        else {
          $this->actionLogin();
        }
    }
    else
    {
      $this->actionLogin();
    }
  }

  public function actionPostSignup()
  {
    if ($_POST && !empty($_POST['inputNome']) && !empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])) {
        $data = json_encode([
          'nome' => $_POST['inputNome'],
          'email' => $_POST['inputEmail'],
          'senha' => $_POST['inputPassword']
        ]);
        $msg = Helper::sendPostRequest('cliente', $data);
        $msg = json_decode($msg);

        if($msg->mensagem === 'ok') {
          $obj = Helper::sendPostRequest('usuario', $data);
            $obj = json_decode($obj);
          $_SESSION['estabelecimento'] = [
            'key' => $msg->chave,
            'nome' => $obj->nome,
            'email' => $obj->email,
            'id' => $obj->idestabelecimento
          ];


          header('Location: ./PromocaoController.php?controller=promocao&action=list');
        }
    }
    else
    {
      $this->actionSignup();
    }
  }

  public function actionSignup()
  {
    $_SESSION['path'] = 'estabelecimento/signup.php';
    header('Location: ../../index.php?controller=estabelecimento&action=signup');
  }

  public function actionInit()
  {

    if (isset($_SESSION['estabelecimento']) && !($this->action === 'logout')) {
        header('Location: ./PromocaoController.php?controller=promocao&action=list');
    }
    else
    {
      switch ($this->action) {
        case 'login':
          $this->actionLogin();
          break;
        case 'logout':
          $this->actionLogout();
          break;
        case 'postlogin':
          $this->actionPostLogin();
          break;
        case 'signup':
          $this->actionSignup();
          break;
        case 'postsignup':
          $this->actionPostSignup();
          break;
        default:
          $this->actionLogin();
          break;
      }
    }

  }

}

$estabelecimentoController = new EstabelecimentoController();
$estabelecimentoController->actionInit();

?>
