<?php

include('requires/m2brimagem.class.php');

$oImg = new m2brimagem('trooper.jpg');



// EXEMPLOS RÁPIDOS.

// MARCA D'AGUA
// arquivo, x, y, alfa
$oImg->marca('selo-imperio.png',40,10,NULL);

// GIRAR
$oImg->flip('h');

// TEXTO / LEGENDA
$rgb = array(255,255,255);
// texto da legenda, tamanho do texto, x, y, cor (array rgb),
// truetype (true ou false), nome da fonte
$oImg->legenda('STORM TROOPER','11','20','20',$rgb,false,NULL);




// NOVA MARCA
$oImg->marcaFixa('selo-imperio.png','baixo_direita');




// NOVOS METODOS DE REDIMENSIONAMENTO.

// 29% da altura da imagem original, largura na proporção
$oImg->redimensiona('', '29%');
// 50% da largura da imagem original, altura na proporção
$oImg->redimensiona('50%', '');


$oImg->posicaoCrop( 20, 30 ); // x = 20, y = 30
$oImg->redimensiona( 100, 100, 'crop' );


$oImg->rgb( 255, 255, 255 ); // branco
$oImg->redimensiona( 200, '', 'fill' );

?>