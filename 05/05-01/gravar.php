<?php


$fp = fopen("dados-novo.txt", "w");
fwrite($fp, "Hello World!"); // grava a string no arquivo. Se o arquivo não existir ele será criado
fclose($fp);