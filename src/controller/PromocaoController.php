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
    $_SESSION['msg'] = $promocoes;
    header('Location: ../../index.php?controller=promocao&action=index');
  }

  public function actionView($id)
  {
    $promocao = Helper::sendGetRequest('promocao/'.$id);
    $_SESSION['msg'] = $promocao;
    header('Location: ../../index.php?controller=promocao&action=view');
  }

  public function actionInit()
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

if ($_SESSION['user']) {
   $promocaoController = new PromocaoController();
   $promocaoController->actionInit();
}
header('Location: ./UserController.php?controller=user&action=login');

?>
