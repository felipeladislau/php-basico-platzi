<?php

//require_once('classes\Imovel.php');
require_once('classes\Apartamento.php');


//$casaFelipe = new Imovel;
$casaFelipe = new Apartamento('Apartamento 1', 'Avenida Paulista, 1820');

echo $casaFelipe->alugaImovel("Felipe", 1000) . "\n";

echo $casaFelipe->defineAndar(2);