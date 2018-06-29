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
    $promocoes = Helper::sendGetRequest($_SESSION['estabelecimento']['key'].'/promocao');
    $_SESSION['path'] = 'promocao/index.php';
    $_SESSION['msg'] = $promocoes;
    header('Location: ../../index.php?controller=promocao&action=index');
  }

  public function actionView($id)
  {
    $promocao = Helper::sendGetRequest($_SESSION['estabelecimento']['key'].'/promocao/'.$id);
    $_SESSION['path'] = 'promocao/view.php';
    $_SESSION['msg'] = $promocao;
    header('Location: ../../index.php?controller=promocao&action=view');
  }

  public function actionDelete($id)
  {
    $promocao = Helper::sendDeleteRequest($_SESSION['estabelecimento']['key'].'/promocao/'.$id);
    // print_r($promocao);
    // $_SESSION['path'] = 'promocao/view.php';
    $this->actionList();
  }

  public function actionCreate()
  {

    $_SESSION['path'] = 'promocao/create.php';

    header('Location: ../../index.php?controller=promocao&action=create');
  }

  public function actionCreatePost()
  {
    if ( $_POST && !empty($_POST['inputTitulo']) && !empty($_POST['inputImagem'])
      && !empty($_POST['inputExpirationDate']) && !empty($_POST['inputValue'])
      && !empty($_POST['inputNumber'])) {
        $data = json_encode([
          'titulo' => $_POST['inputTitulo'],
          'imagem_campanha' => $_POST['inputImagem'],
          'validade' => $_POST['inputExpirationDate'],
          'valor' => $_POST['inputValue'],
          'quantidade' => $_POST['inputNumber']
        ]);
        $msg = Helper::sendPostRequest($_SESSION['estabelecimento']['key'].'/promocao', $data);
        $msg = json_decode($msg);

        if(isset($msg->mensagem)) {
          header('Location: ./PromocaoController.php?controller=promocao&action=list');
        }
        else {
          $this->actionCreate();
        }
    }
    else
    {
      $this->actionCreate();
    }
  }

  public function actionInit()
  {
    if (!$_SESSION['estabelecimento']) {
      header('Location: ./EstabelecimentoController.php?controller=estabelecimento&action=login');
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
        case 'create':
          $this->actionCreate();
          break;
        case 'createPost':
          $this->actionCreatePost();
          break;
        case 'delete':
          $this->actionDelete($this->id);
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
