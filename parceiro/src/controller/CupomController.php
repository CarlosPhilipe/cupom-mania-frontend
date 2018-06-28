<?php
session_start();
require('Controller.php');
require(__dir__."/../model/Helper.php");
class CupomController extends Controller {

  public function actionIndex()
  {
    $this->actionList();
  }

  public function actionCreate()
  {
    $data = [
      "idpromocao" => $this->id,
      "idcliente" =>$_SESSION['user']['id']
    ];
    $data = json_encode($data);
    $obj = Helper::sendPostRequest('cupom', $data);
    $obj =  json_decode($obj);
    $_SESSION['path'] = 'cupom/create.php';
    $_SESSION['msg'] = $obj;
    // print_r($obj);
    header('Location: ../../index.php?controller=cupom&action=create&id='.$this->id);
  }

  public function actionView($id)
  {
    $cupom = Helper::sendGetRequest('cupom/'.$id);
    $_SESSION['path'] = 'cupom/view.php';
    $_SESSION['msg'] = $cupom;
    header('Location: ../../index.php?controller=cupom&action=view');
  }

  public function actionInit()
  {
    if (!$_SESSION['promocao']) {
      header('Location: ./UserController.php?controller=user&action=login');
    }
    else
    {
      switch ($this->action) {
        case 'create':
          $this->actionCreate();
          break;
        default:
          $this->actionIndex();
          break;
      }
    }
  }

}

$cupomController = new CupomController();
$cupomController->actionInit();

?>
