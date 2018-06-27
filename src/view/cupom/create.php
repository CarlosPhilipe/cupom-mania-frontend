
<?php
session_start();

$value = $_SESSION['msg'];
// print_r($value);
?>

<div class="row">
<div class="col-sm-12"><h2>Seu código promocional é:</h2></div>
<div class="col-sm-12"><h1><?php echo ($value->result) ?></h1></div>
</div>
