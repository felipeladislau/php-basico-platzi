<?php

/********************* EXEMPLO 1 *********************/
preg_match_all('/<([^-->]+)>(.*)<\/\1>/U',
    "<div>aaa</div><p>bbb</p><div>ccc</div>", $matches);
var_dump($matches);



/********************* EXEMPLO 2 *********************/


preg_match_all('/<([^-->]+)>(.*)<\/\1>/',
    "<div>aaa</div><p>bbb</p><div>ccc</div>", $matches);
var_dump($matches);




/********************* EXEMPLO 3 *********************/

$cpf = preg_replace("/[^0-9]/", "", $cpf);


?>