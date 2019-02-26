<?php

/*
*   Aula 03 - sessão 02
*   Trabalhando com dados entre páginas (URL, GET, POST, SESSION e COOKIES).
*   Platzi Cursos on-line.
*   Professor Felipe Ladislau.
*/


/************************ 1º FORMULÁRIO ************************/

$email = $_GET['email'];
$senha = $_GET['senha'];

echo "Email do usuário: " . $email . "<br> Senha do usuário: " . $senha;


/************************ 2º FORMULÁRIO ************************/


$email = $_POST['email'];
$tamanhoPizza = $_POST['tamanhoPizza'];

$_POST['complementos'] = implode(', ', $_POST['complementos']);

$observacoes = $_POST['observacoes'];


/************************ 3º FORMULÁRIO ************************/

$email = $_GET['email'];
$senha = $_GET['senha'];
$endereco1 = $_GET['endereco1'];
$endereco2 = $_GET['endereco2'];
$cidade = $_GET['cidade'];
$estado = $_GET['estado'];
$cep = $_GET['cep'];


/*************************** COOKIES ***************************/


// Salvando dados em um cookie.
$meuCookie = "Email do usuário: " . $email . "<br> Senha do usuário: " . $senha;
setcookie("usuario",$meuCookie,time()+$int);
/* usuario é o cookie, a variável tem os dados
$int é o tempo no qual o cookie expira*/


// Mostrando o cookie.
echo $_COOKIE["usuario"];


// Atualizar o cookie.
setcookie("usuario","Não tem mais úsuário");
echo $_COOKIE["usuario"];


// Deletar cookie.
unset($_COOKIE["usuario"]);
/*Ou*/
setcookie("usuario","lorem",time()-1);
/*Já venceu, portanto não existe...*/

?>