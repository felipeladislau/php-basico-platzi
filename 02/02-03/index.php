<?php

/*
*   Aula 03 - sessão 02
*   Trabalhando com dados entre páginas (URL, GET, POST, SESSION e COOKIES).
*   Platzi Cursos on-line.
*   Professor Felipe Ladislau.
*/


session_start();

$_SESSION['formulario1'] = "Formulário básico";
$_SESSION['formulario2'] = "Formulário para pedido de pizza";
$_SESSION['formulario3'] = "Formulário de cadastro";

for($i=1; $i<4; $i++)
    echo "<a href='form".$i.".html'> Formulário de Cadastro ".$i." </a> <br>";



?>