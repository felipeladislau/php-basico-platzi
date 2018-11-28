<?php

/*
*   Aula 02 - sessão 02
*   Os diversos loops de repetição em PHP.
*   Platzi Cursos on-line.
*   Professor Felipe Ladislau.
*/


/************************* CONDICIONAIS *************************/

if( 1 == 1 ){
  //código 1
  
}
else{
//código 2

}

/*******************************************************************/


if( $val < 0 || $val ==0 ){ 
  //Val é menor que zero OU zero.

}
else if( $val > 0 && $val < 10 ){
  //Val é maior do que zero (Não conta o zero) E menor  que dez (Não conta o dez)

}
else{
  //Qualquer outro caso, quais casos?

}

/*******************************************************************/

if($hora <= 12)
echo "Está de manhã";
else if($hora > 12 && $hora <= 18)
  echo "Está de tarde";
else
  echo "Está de noite";

/*******************************************************************/

switch(expressão){
    case valor1:
    //código 1
    break;
    case valor2:
    //código 2
    break;
    default:
    //código padrão
    break;
}

/*******************************************************************/

switch($opcao){
    case 1:
    //código 1

    break;

    case 2:
    //código 2

    break;

    case 3:
    //código 3

    break;

    case 4:
    //código 4

    break;

    case 5:
    //código 5

    break;

    default:
    //nenhuma das opções

    break;
}





/************************* LAÇOS DE REPETIÇÃO *************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

echo $mensagem . '<br />' . PHP_EOL ;
echo $mensagem . '<br />' . PHP_EOL ;
echo $mensagem . '<br />' . PHP_EOL ;

/*******************************************************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

$i = 1;
while( $i <= 100 ){
  echo $i . ' - ' .$mensagem . '<br />' . PHP_EOL ;
  $i++;
}

/*******************************************************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

$i = 1;
while( $i <= 100 ){
  echo $i . ' - ' .$mensagem . '<br />' . PHP_EOL ;
}

/*******************************************************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

$i = 100;
while( $i >= 1 ){
  echo $i . ' - ' .$mensagem . '<br />' . PHP_EOL ;
  $i--;
}

/*******************************************************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

$i = 1;

do {
  echo $i . ' - ' .$mensagem . '<br />' . PHP_EOL ;
  $i++;
} while( $i <= 100 );

/*******************************************************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

$i = 150;

do {
  echo $i . ' - ' .$mensagem . '<br />' . PHP_EOL ;
  $i++;
} while( $i <= 100 );

/*******************************************************************/

$mensagem = "Estou aprendendo loopings no Aprender PHP";

$i = 150;

while ( $i <= 100 ) {
  echo $i . ' - ' .$mensagem . '<br />' . PHP_EOL ;
  $i++;
}

/*******************************************************************/

for($i =1; $i < 20; $i++){
    echo "O Valor de I = ".$id;
}

/*******************************************************************/

for($i =1; $i < 20; $i++){
    echo "Upload ".$i.": <input type='text' name='".$i."'/><br/>";
}

/*******************************************************************/

$vetor = array(1, 2, 3, 4, 5);
for($i = 0; $i < 5; $i++)
{
  $item = $vetor[$i];
echo $item;
}

/*******************************************************************/

$vetor = array(1, 2, 3, 4, 5);
foreach($vetor as $item)
{
echo $item;
}

/*******************************************************************/



?>