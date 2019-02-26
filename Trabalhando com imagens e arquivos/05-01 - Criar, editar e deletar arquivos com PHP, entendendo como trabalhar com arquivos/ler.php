<?php
/*
- r: abre o arquivo no modo somente leitura e posiciona o ponteiro no início do arquivo; 
	o arquivo já deve existir;
- r+: abre o arquivo para leitura/escrita, posiciona o ponteiro no início do arquivo;
- w: abre o arquivo no modo somente escrita; se o arquivo já existir, será sobrescrito; 
	senão, será criado um novo;
- w+: abre o arquivo para escrita/leitura; se o arquivo já existir, será sobrescrito; 
	senão, será criado um novo;
- a: abre o arquivo para anexar dados, posiciona o ponteiro no final do arquivo; 
	se o arquivo não existir, será criado um novo;
- a+: abre o arquivo para anexo/leitura, posiciona o ponteiro no final do arquivo; 
	se o arquivo não existir, será criado um novo;
*/

// Faz a leitura do arquivo, o handle FP vai conter o arquivo aberto.
$fp = fopen("dados.txt", "r");
$char = "";

// Também é possível ler o código fonte de páginas da WEB.
$fh = fopen("http://4steps.com.br/", "r");


// Rodamos o arquivo inteiro com FEOF, e montamos uma string caráctere por caráctere.
while (!feof($fp)){
    $char .= fgetc($fp);
} 

// Fechamos o arquivo.
fclose($fp);

// Imprime dados.
echo $char."<br><br>";



// FREAD
$fp = fopen("dados.txt", "r");
$texto = fread($fp, 20); // lê 20 bytes do arquivo e armazena em $texto
fclose($fp);
echo $texto;


// FGETS
// Esta função é usada na leitura de strings de um arquivo. 
// fgets() lê "length - 1" bytes do arquivo. Por default lê 1024 bytes para o comprimento da linha.
$fp = fopen("dados.txt", "r");
$texto = fgets($fp, 3); 
fclose($fp);
echo $texto;




?>