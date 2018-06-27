<?php
session_start();
require('Controller.php');
require(__dir__."/../model/Helper.php");
class UserController extends Controller {

  public function actionIndex()
  {
    $this->actionLogin();
  }

  public function actionLogin()
  {
    $_SESSION['path'] = 'user/login.php';
    header('Location: ../../index.php?controller=user&action=login');
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
        $msg = Helper::sendPostRequest('usuario', $data);
        $msg = json_decode($msg);
        if($msg->idcliente) {
          $_SESSION['user'] = [
            'nome' => $msg->nome,
            'email' => $msg->email,
            'id' => $msg->idcliente
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
          $_SESSION['user'] = [
            'nome' => $obj->nome,
            'email' => $obj->email,
            'id' => $obj->idcliente
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
    $_SESSION['path'] = 'user/signup.php';
    header('Location: ../../index.php?controller=user&action=signup');
  }

  public function actionInit()
  {

    if (isset($_SESSION['user']) && !($this->action === 'logout')) {
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

$userController = new UserController();
$userController->actionInit();

?>
