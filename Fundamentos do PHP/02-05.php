<?php

/*
*   Aula 02 - sessão 02
*   Como trabalhar com datas e horas.
*   Platzi Cursos on-line.
*   Professor Felipe Ladislau.
*/



// Consulete:
//      http://php.net/manual/pt_BR/function.date.php
//      https://secure.php.net/manual/pt_BR/book.datetime.php


/********************************************************************************************/

echo date("d/m/Y");
// Data de hoje.

// Modifica a zona de tempo a ser utilizada. Disnovível desde o PHP 5.1
date_default_timezone_set('UTC');

// Exibe alguma coisa como: Monday
echo date("l");

// Exibe alguma coisa como: Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A');

// Exibe: July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

/* utiliza as constantes do parâmetro de formato */
// Exibe alguma coisa como: Mon, 15 Aug 2005 15:12:46 UTC
echo date(DATE_RFC822);

// Exibe alguma coisa como: 2000-07-01T00:00:00+00:00
echo date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));


/********************************************************************************************/

$nextWeek = time() + (7 * 24 * 60 * 60);
  echo 'Now:       '. date('d-m-Y') ."<br>";
  echo 'Next Week: '. date('d-m-Y', $nextWeek) ."<br>";
  echo 'Next Week: '. date('d-m-Y', strtotime('+1 week')) ."<br>";
// Now: 04-07-2015 à Data atual 
// Next Week: 11-07-2015 à Uma semana após a data atual
// Next Week: 11-07-2015 à Uma semana após a data atual utilizando strtotime


/********************************************************************************************/

echo 'Next Month: '. date('d-m-Y', strtotime('+1 month')) ."<br>";
  // Next Month: 04-08-2015


/********************************************************************************************/


$data = mktime(02,30,00,04,30,1995);
// Mostra 30-04-1995
echo date("d-m-Y", $data)."<br>";

// Mostra 30-04-1995 02:30
echo date("d-m-Y H:i", $data)."<br>";

// Mostra 1995 
echo date("Y", $data)."<br>";


/********************************************************************************************/


$atual = new DateTime();
$especifica = new DateTime(' 1990-01-22');
$texto = new DateTime(' +1 month');

print_r($atual);
print_r($especifica);
print_r($texto);


/********************************************************************************************/


$data = new DateTime();
echo $data->format('d-m-Y H:i:s'); 
$data = new DateTime('+1 month');
echo $data->format('d-m-Y H:i:s'); 

// 20-06-2015 19:47:27
// 20-07-2015 19:47:27



/********************************************************************************************/



$data = new DateTime('22-01-1990');
$data->modify('+1 month');
echo $data->format('d-m-Y H:i:s');

// 22-02-1990 00:00:00



/********************************************************************************************/



$data = new DateTime('22-01-1990');
$data->setDate(1995, 3, 9);
echo $data->format('d-m-Y H:i:s');

// 09-03-1995 00:00:00



/********************************************************************************************/



$fuso = new DateTimeZone('America/New_York');
$data = new DateTime('22-01-1990');
$data->setTimezone($fuso);
echo $data->format('d-m-Y H:i:s');
// 21-01-1990 19:00:00



/********************************************************************************************/



$intervalo = new DateInterval('P2Y4D');
echo $intervalo->format('%y anos e %d dias');
// 2 anos e 4 dias



/********************************************************************************************/



$data1 = new DateTime('2011-09-11');
$data2 = new DateTime('2011-10-13');
$intervalo = $data1->diff($data2);
echo $intervalo->format('%R%a dias');
// +32 dias



/********************************************************************************************/



$data1 = new DateTime('2011-09-11');
$data2 = new DateTime('2011-10-13');
var_dump($data1 == $data2); 
var_dump($data1 > $data2);
var_dump($data1 < $data2);
// boolean false
// boolean false
// boolean true



?>