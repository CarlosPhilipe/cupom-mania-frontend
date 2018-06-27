<?php
session_start();
require('Controller.php');
require(__dir__."/../model/Helper.php");
class PromocaoController extends Controller {

  public function actionIndex()
  {
    $this->actionList();
  }

  public function actionList()
  {
    $promocoes = Helper::sendGetRequest('promocao');
    $_SESSION['path'] = 'promocao/index.php';
    $_SESSION['msg'] = $promocoes;
    header('Location: ../../index.php?controller=promocao&action=index');
  }

  public function actionView($id)
  {
    $promocao = Helper::sendGetRequest('promocao/'.$id);
    $_SESSION['path'] = 'promocao/view.php';
    $_SESSION['msg'] = $promocao;
    header('Location: ../../index.php?controller=promocao&action=view');
  }

  public function actionInit()
  {
    if (!$_SESSION['user']) {
      header('Location: ./UserController.php?controller=user&action=login');
    }
    else
    {
      switch ($this->action) {
        case 'list':
          $this->actionList();
          break;
        case 'view':
          $this->actionView($this->id);
          break;
        case 'index':
          $this->actionIndex();
          break;
        default:
          $this->actionIndex();
          break;
      }
    }
  }

}

$promocaoController = new PromocaoController();
$promocaoController->actionInit();

?>
