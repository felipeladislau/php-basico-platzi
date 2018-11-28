<?php

/*
*   Aula 04 - sessão 02
*   Como utilizar funções e TRY-CATCH.
*   Platzi Cursos on-line.
*   Professor Felipe Ladislau.
*/



// Funções definidas pelo usuário

function foo ($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Exemplo de função.\n";
    return $valor_retornado;
}

/********************************************************************************************/

$makefoo = true;

/* Nos nao podemos chamar foo() daqui
   porque ela ainda não existe,
   mas nos podemos chamar bar() */

bar();

if ($makefoo) {
  function foo()
  {
    echo "Eu não existo até que o programa passe por aqui.\n";
  }
}

/* Agora nos podemos chamar foo()
   porque $makefoo foi avaliado como true */

if ($makefoo) foo();

function bar(){
  echo "Eu existo imediatamente desde o programa começar.\n";
}

/********************************************************************************************/

function foo2(){

  function bar(){
    echo "Eu não existo até foo() ser chamada.\n";
  }

}

/* Nós não podemos chamar bar() ainda
   porque ela ainda não foi definida. */

foo2();

/* Agora nós podemos chamar bar(),
   porque o processamento de foo()
   tornou a primeira acessivel */

bar();

/********************************************************************************************/

function recursion($a){
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}

// Fim Funções definidas pelo usuário



/********************************************************************************************/



// Argumentos de funções

function takes_array($input){

    echo "$input[0] + $input[1] = ", $input[0]+$input[1];

}


/********************************************************************************************/


function add_some_extra(&$string){

    $string .= ' e alguma coisa mais.';

}

$str = 'Isto é uma string,';
add_some_extra($str);
echo $str;    // imprime 'Isto é uma string, e alguma coisa mais.'


/********************************************************************************************/


function makecoffee($type = "cappuccino"){

    return "Fazendo uma xícara de café $type.\n";

}

echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");


/********************************************************************************************/


function makecoffee2($types = array("cappuccino"), $coffeeMaker = NULL){

    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";

}

echo makecoffee2();
echo makecoffee2(array("cappuccino", "lavazza"), "teapot");


/********************************************************************************************/


function iogurtera ($tipo = "azeda", $sabor){

    return "Fazendo uma taça de $sabor $tipo.\n";

}

echo iogurtera ("framboesa");   // não funciona como esperado


/********************************************************************************************/


function test(int $param) {
    // processamentos ....
}

test(true);


// Fim Argumentos de funções


/********************************************************************************************/


// Try Catch

// PHP 5 possui um modelo de exceções similar ao de outras linguagens de programação. 
// Uma exceção pode ser lançada (throw) e capturada (catch). 
// Código pode ser envolvido por um bloco try para facilitar a captura de exceções potenciais.
// Cada bloco try precisa ter ao menos um bloco catch ou finally correspondente.

/********************************************************************************************/

function inverse($x) {
    if (!$x) {
        throw new Exception('Divisão por zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}

// Execução continua
echo "Olá mundo\n";

/********************************************************************************************/

function inverse2($x) {
    if (!$x) {
        throw new Exception('Divisão por zero.');
    }
    return 1/$x;
}

try {
    echo inverse2(5) . "\n";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} finally {
    echo "Primeiro finaly.\n";
}

try {
    echo inverse2(0) . "\n";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} finally {
    echo "Segundo finally.\n";
}

// Execução continua
echo "Olá mundo\n";

/********************************************************************************************/

class MyException extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

$foo = new Test;
$foo->testing();

// FimTry Catch

?>