<?php

//require_once('classes\Imovel.php');
require_once('classes\Apartamento.php');


//$casaFelipe = new Imovel;
$casaFelipe = new Apartamento;

echo $casaFelipe->alugaImovel("Felipe") . "\n";

echo $casaFelipe->defineAndar(2);