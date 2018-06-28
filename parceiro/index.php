<?php
session_start();
$action = $_GET['action'];
$controller = $_GET['controller'];
$path = $_SESSION['path'];

// print_r($_SESSION['user']);
$_SESSION['path'] = null;
if ($controller === null && $action === null) {
    header('Location: src/controller/EstabelecimentoController.php?controller=estabelecimento&action=login');
}
if (!$path) {
    header('Location: src/controller/EstabelecimentoController.php?controller=estabelecimento&action=login');
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cupom</title>
    <link href="src/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/resources/css/promocao.css" rel="stylesheet">
  </head>
  <body>
    <?php include(__dir__."/src/view/layouts/menu.php"); ?>
    <div class="container">
      <?php
        include(__dir__."/src/view/$path");
      ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="src/resources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
