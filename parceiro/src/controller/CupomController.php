<?php
session_start();
require('Controller.php');
require(__dir__."/../model/Helper.php");
class CupomController extends Controller {

  public function actionIndex()
  {
    $this->actionList();
  }

  public function actionValidarPost()
  {
    if ( $_POST && !empty($_POST['codigo'])) {
      $data = [
        "numero_cupom" => $_POST['codigo']
      ];
      $data = json_encode($data);
      $obj = Helper::sendPostRequest($_SESSION['estabelecimento']['key'].'/cupom/validar', $data);
      $obj =  json_decode($obj);
      $_SESSION['path'] = 'cupom/validar.php';
      $_SESSION['msg'] = $obj;
      // print_r($obj);
      header('Location: ../../index.php?controller=cupom&action=validar');
    }

  }

  public function actionValidar()
  {
    // $cupom = Helper::sendGetRequest('cupom/'.$id);
    $_SESSION['path'] = 'cupom/validar.php';
    // $_SESSION['msg'] = $cupom;
    header('Location: ../../index.php?controller=cupom&action=validar');
  }

  public function actionInit()
  {
    if (!$_SESSION['estabelecimento']) {
      header('Location: ./UserController.php?controller=user&action=login');
    }
    else
    {
      switch ($this->action) {
        case 'validar':
          $this->actionValidar();
          break;
        case 'validarPost':
          $this->actionValidarPost();
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
