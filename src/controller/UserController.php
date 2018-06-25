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
    header('Location: ../../index.php?controller=user&action=login');
  }

  public function actionPostLogin()
  {
    if ($_POST) {
        $data = json_encode([
          'nome' => 'value1',
          'email' => 'value2@gmail.com',
          'senha' => 'value2'
        ]);
        $msg = Helper::sendPostRequest('cliente', $data);
        $msg = json_decode($msg);
        // $_SESSION['msg'] = $promocoes;
        var_dump($msg);
    //   print_r($_POST);
    }
    $this->actionLogin();
  }

  public function actionPostSignup()
  {

    if ($_POST && isset($_POST['inputNome']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
        $data = json_encode([
          'nome' => $_POST['inputNome'],
          'email' => $_POST['inputEmail'],
          'senha' => $_POST['inputPassword']
        ]);
        $msg = Helper::sendPostRequest('cliente', $data);
        $msg = json_decode($msg);

        if($msg->mensagem === 'ok') {
          $_SESSION['user'] = [
            'nome' => $_POST['inputNome'],
            'email' => $_POST['inputEmail'],
            'senha' => $_POST['inputPassword']
          ];
          header('Location: ./PromocaoController.php?controller=promocao&action=list');
        }
    }
    $this->actionSignup();
  }

  public function actionSignup()
  {
    header('Location: ../../index.php?controller=user&action=signup');
  }

  public function actionInit()
  {
    switch ($this->action) {
      case 'login':
        $this->actionLogin();
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

$userController = new UserController();
$userController->actionInit();

?>
