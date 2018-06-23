<?php
// $promocao = require_once('./src/view/promocao/index.php');
$action = $_GET['action'];
$controller = $_GET['controller'];

// echo "$controller/$action";
$path = __dir__."/src/view/$controller/$action.php";
if (!file_exists($path)) {
  $path = __dir__."/src/view/$controller/index.php";
  if (!file_exists($path)) {
      $path = __dir__."/src/view/promocao/index.php";
  }
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
    <?php
      // include(__dir__."/src/environment.");
      include(__dir__."/src/view/layouts/menu.php");
      include($path);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="src/resources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
