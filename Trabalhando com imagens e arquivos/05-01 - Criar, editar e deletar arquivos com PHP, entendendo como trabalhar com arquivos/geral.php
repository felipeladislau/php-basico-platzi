<?php


// Contar o número de linhas de um arquivo, iniciando com 1
$fp = "dados.txt";
$line_count = count (file ($fp));
echo $line_count;



// Lê uma linha especifica.
$fn = "dados-grande.txt";
$nr_linha = 10;
$f_contents = file ($fn);
$sua_linha = $f_contents [$nr_linha];
print $sua_linha;

// Lê arquivos de uma pasta
$dn = opendir ("arquivos/");
while ($file = readdir ($dn)) {
	print "$file<br>";
}
closedir($dn);



// Excluindo arquivos
/*
$fn = "arquivos/teste.jpg";

$ret = unlink ($fn);
if ($ret){
	 die ("Arquivo excluído!");
}else{
	die ("Erro ao excluir arquivo");
}*/


// Copiando um arquivo
$fj = "dados.txt";

if (copy ($fj, "arquivos/dados.txt")){
	 die ("Arquivo '$fj' copiado para arquivos/dados.txt ");
}else{
	die ("Erro ao copiar arquivo");
}