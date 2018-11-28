<?php

/*
*   Aula 01 - sessão 02
*   Variáveis em PHP, como utilizar, tipos de dados e etc.
*   Platzi Cursos on-line.
*   Professor Felipe Ladislau.
*/


$minhaString = "Hello Wordl!";

echo $minhaString;

echo "Hello World!";

$aluno = "João";
$curso = "PHP Básico";
$professor = "Felipe";

echo "$aluno ${$curso}";

echo "O " . $aluno . " faz o curso de " . $curso . " com o professor " . $professor;


/********************************************************/


$num1 = 09218;
$num2 = 98772;
$num3 = 321321.80;

echo $num1 . $num2 . $num3;

echo $num1 + $num2 . $num3;

echo $num1 + $num2 + $num3;


/********************************************************/

$verdade = true;
$mentira = false;

$teste = null;


/************************** ARRAYS - AULA 2 ******************************/


$array = array(
    "foo" => "bar",
    "bar" => "foo",
);


// a partir do PHP 5.4
$array1 = [
    "foo" => "bar",
    "bar" => "foo",
];


$array2 = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);
var_dump($array2);


$array3 = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array3);


/**************************************/

$array4 = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array4["foo"]);
var_dump($array4[42]);
var_dump($array4["multi"]["dimensional"]["array"]);


/***************************************/

$cores = array('vermelho', 'azul', 'verde', 'amarelo');

foreach ($cores as $cor) {
    echo "Você gosta de $cor?\n";
}

/*************************************/

$fruits = array ( "frutas"  => array ( "a" => "laranja",
                                       "b" => "banana",
                                       "c" => "maçã",
                                     ),
                  "numeros" => array ( 1,
                                       2,
                                       3,
                                       4,
                                       5,
                                       6
                                     ),
                  "buracos" => array (      "primeiro",
                                       5 => "segundo",
                                            "terceiro",
                                     ),
                );

// Alguns exemplo de enderecos dos valores do array acima
echo $fruits["buracos"][5];   // prints "segundo"
echo $fruits["frutas"]["a"];  // prints "laranja"
unset($fruits["buracos"][0]); // remove "primeiro"

// Criando um novo array multidimensional
$sucos["maca"]["verde"] = "bom";



?>