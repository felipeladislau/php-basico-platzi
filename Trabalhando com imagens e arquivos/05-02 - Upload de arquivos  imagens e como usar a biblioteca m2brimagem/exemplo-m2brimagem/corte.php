<?php

include('requires/m2brimagem.class.php');


// SIMPLES
$oImg = new m2brimagem('trooper.jpg');

$valida = $oImg->valida();

if ($valida == 'OK') {
  $oImg->redimensiona(200,200,'crop');
    $oImg->grava();
} else {
  die($valida);
}

exit;



// PERSONALIZADO

$arquivo  = $_GET['arquivo'];
$largura  = $_GET['largura'];
$altura    = $_GET['altura'];

$oImg = new m2brimagem($arquivo);

$valida = $oImg->valida();

if ($valida == 'OK') {
    $oImg->redimensiona($largura,$altura,'crop');
    $oImg->grava();
} else {
  die($valida);
}
exit;

?>